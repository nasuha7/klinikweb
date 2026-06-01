<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     * Penggunaan: ->middleware('role:admin') atau ->middleware('role:admin,dokter')
     */
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        // Kalau belum login, redirect ke login
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $user = Auth::user();

        // Cek apakah role user ada di dalam daftar role yang diizinkan
        if (!in_array($user->role, $roles)) {
            // Redirect ke halaman yang sesuai dengan role mereka
            return match ($user->role) {
                'admin'  => redirect()->route('admin.dashboard')->with('error', 'Akses ditolak.'),
                'dokter' => redirect()->route('dokter.dashboard')->with('error', 'Akses ditolak.'),
                'pasien' => redirect()->route('pasien.dashboard')->with('error', 'Akses ditolak.'),
                default  => redirect()->route('home')->with('error', 'Akses ditolak.'),
            };
        }

        return $next($request);
    }
}
