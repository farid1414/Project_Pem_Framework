<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\Profil;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function login()
    {
        return view('/login');
    }
    public function registrasi()
    {
        return view('/register');
    }

    // untuk login masuk user atau admin
    public function postlogin(Request $request)
    {
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('/admin');
        } elseif (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('/');
        }
        return Redirect::back()->with('gagal', 'Email atau kata sandi anda salah');
    }

    // logout
    public function logout(Request $request)
    {

        if (auth::guard('admin')->check()) {
            auth::guard('admin')->logout();
        } elseif (auth::guard('web')->check()) {
            auth::guard('web')->logout();
        }
        return redirect('/');
    }

    // registrasi user 
    public function postregis(Request $request)
    {
        $this->validate($request, [
            'nama_depan' => 'required|alpha|max:255',
            'nama_belakang' => 'required|alpha|max:255',
            'email' => 'required|email',
            'jenis_kelamin' => 'alpha',
            'password' => 'required|min:6|alpha_num'
        ]);

        $fullname = $request->nama_depan . " " . $request->nama_belakang;
        $pass = $request->password;
        // tambbah data ke user 
        $user = new \App\Models\User;
        $user->name = $fullname;
        $user->email = $request->email;
        $user->password = bcrypt($pass);
        $user->remember_token = Str::random(60);
        $user->save();

        Profil::create([
            'user_id' => $user->id,
            'nama_depan' => $request->nama_depan,
            'nama_belakang' => $request->nama_belakang,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);


        return redirect('/login');
    }
}