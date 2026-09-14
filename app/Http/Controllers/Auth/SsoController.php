<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\Auth\OAuth2ClientService;
use App\Services\Auth\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SsoController extends Controller
{
    public function __construct(
        private OAuth2ClientService $oauth2ClientService,
        private UserService $userService
    ) {
    }

    public function login(): RedirectResponse
    {
        return redirect()->away(
            $this->oauth2ClientService->getAuthorizationUrl()
        );
    }

    public function callback(Request $request): RedirectResponse
    {
        // 1. Validasi callback + ambil authorization code
        $code = $this->oauth2ClientService
            ->validateCallback($request);

        // 2. Tukar authorization code menjadi token
        $tokenData = $this->oauth2ClientService
            ->exchangeTokenSso($code);

        if (empty($tokenData['access_token'])) {
            throw new \RuntimeException(
                'Access token tidak ditemukan dari response SSO.'
            );
        }

        // 3. Simpan token ke session
        $request->session()->put([
            'sso_access_token' => $tokenData['access_token'],
            'sso_refresh_token' => $tokenData['refresh_token'] ?? null,
            'sso_token_expires_at' => isset($tokenData['expires_in'])
                ? now()->addSeconds($tokenData['expires_in'])
                : null,
        ]);

        // 4. Ambil user dari BRIN SSO
        $ssoUser = $this->oauth2ClientService
            ->getInfoUser($tokenData['access_token']);

        // 5. Provision/update user lokal
        $user = $this->userService
            ->updateOrCreateUser($ssoUser);

        // 6. Login Laravel
        Auth::login($user);

        // 7. Regenerate session
        $request->session()->regenerate();

        // 8. Redirect website
        return redirect()->route('dashboard');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->away(
            config('services.sso.logout_url')
        );
    }
}