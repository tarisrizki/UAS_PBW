<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Periksa apakah pengguna telah diotentikasi
        if (!Auth::check()) {
            // Jika tidak, arahkan pengguna ke halaman login
            return redirect()->route('login');
        }

        // Periksa apakah pengguna adalah admin
        if (Auth::user()->admin === 1) {
            // Jika iya, lanjutkan dengan permintaan berikutnya
            return $next($request);
        }

        // Jika bukan admin, arahkan pengguna ke halaman utama
        return redirect()->route('resto.index');
    }
}
