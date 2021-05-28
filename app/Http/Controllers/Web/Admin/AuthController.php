<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\Admin\Auth\LoginReq;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function halaman_login() {
        return view('admin.login');
    }

    public function login(LoginReq $request) {

        $identitas = [
            "email" => $request->email,
            "password" => $request->password
        ];

        if (Auth::attempt($identitas)) {

            $request->session()->regenerate();

            return redirect()->intended('admin/diagnosis');

        }

        return back()->withErrors([
            'email' => 'Alamat E-Mail atau password yang dimasukan salah'
        ]);

    }
}
