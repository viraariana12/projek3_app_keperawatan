<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Perawat
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
        if (!$request->user()->tokenCan('perawat:biasa'))
        {

            return response()->json(
                [
                    "status" => false,
                    "message" => "Anda tidak diizinkan mengakses halaman ini"
                ]
            ,403);

        } else if (!$request->user()->aktif) {

            return response()->json(
                [
                    "status" => false,
                    "message" => "Akun anda belum diaktifkan"
                ]
            ,403);

        } else {
            return $next($request);
        }
    }
}
