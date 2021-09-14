<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function postlogin(Request $request)
    {
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('/admin');
        } elseif (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('/');
        }
        return Redirect::back()->with('gagal', 'Email atau kata sandi anda salah');
    }
}