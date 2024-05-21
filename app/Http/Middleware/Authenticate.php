<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        // Periksa apakah permintaan mengharapkan respons JSON
        if ($request->expectsJson()) {
            // Jika ya, kembalikan respons JSON yang sesuai
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }

        // Jika tidak, arahkan pengguna ke halaman login
        return route('login');
    }
}
