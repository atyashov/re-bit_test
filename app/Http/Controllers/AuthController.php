<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function form() {

        return view('auth/login');

    }

    public function login(Request $request)
    {

        $request->validate([
            'login' => 'required',
            'password' => 'required'
        ]);

        $isAuth = Auth::attempt([
            'login' => $request->login,
            'password' => $request->password
        ]);

        if ($isAuth) {
            return redirect('admin/app-list');
        }

        return redirect()->back();
    }

    public function logout() {
        Auth::logout();
        return redirect('/');
    }
}
