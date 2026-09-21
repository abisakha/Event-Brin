<?php

namespace App\Services\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class OAuth2ClientService
{
    public function getAuthorizationUrl(): string
    {
        $state = Str::random(40);

        session([
            'sso_state' => $state,
        ]);

        $query = http_build_query([
            'client_id' => config('services.sso.client_id'),
            'redirect_uri' => config('services.sso.redirect'),
            'response_type' => 'code',
            'state' => $state,
        ]);

        return config('services.sso.authorize_url') . '?' . $query;
    }

    public function validateCallback(Request $request): string
    {
        $code = $request->query('code');
        $state = $request->query('state');
        $sessionState = session('sso_state');

        if (!$code) {
            throw ValidationException::withMessages([
                'code' => ['Authorization code tidak ditemukan.'],
            ]);
        }

        if (
            !$state ||
            !$sessionState ||
            !hash_equals($sessionState, $state)
        ) {
            throw ValidationException::withMessages([
                'state' => ['OAuth state tidak valid.'],
            ]);
        }

        session()->forget('sso_state');

        return $code;
    }

    public function exchangeTokenSso(string $code): array
    {
        $response = Http::asForm()->post(
            config('services.sso.token_url'),
            [
                'grant_type' => 'authorization_code',
                'code' => $code,
                'redirect_uri' => config('services.sso.redirect'),
                'client_id' => config('services.sso.client_id'),
                'client_secret' => config('services.sso.client_secret'),
            ]
        );

        if ($response->failed()) {
            throw new \RuntimeException(
                'Gagal mendapatkan access token dari SSO.'
            );
        }

        return $response->json();
    }

    public function getInfoUser(string $accessToken): array
    {
        $response = Http::withToken($accessToken)
            ->acceptJson()
            ->get(config('services.sso.userinfo_url'));

        if ($response->failed()) {
            throw new \RuntimeException(
                'Gagal mendapatkan informasi pengguna dari SSO.'
            );
        }

        return $response->json();
    }
}