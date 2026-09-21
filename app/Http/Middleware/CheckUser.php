<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUser
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        if (!$user instanceof User) {
            abort(403, 'User tidak ditemukan.');
        }

        if (!$user->status) {
            abort(403, 'User tidak aktif.');
        }

        return $next($request);
    }
}