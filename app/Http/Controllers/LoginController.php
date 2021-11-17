<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\Profil;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;

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
    public function ubahPassword($id)
    {
        $decryptID= Crypt::decryptString($id);
        $user = User::find($decryptID);
        return view('/ganti_password');
    }

    public function reload()
    {
        return response()->json(['captcha'=> captcha_img()]);
    }


    // untuk login masuk user atau admin
    public function postLogin(Request $request)
    {
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            toast('Selamat datang admin', 'success');
            return redirect('/admin');
        } elseif (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])) {
            toast('Selamat datang di Sonar ', 'success');
            return redirect('/');
        }

        // $kredensil = $request->only('email', 'password');

        // if (Auth::attempt($kredensil)) {
        //     $user = Auth::user();
        //     if ($user->level == 'admin') {
        //         return redirect()->intended('admin');
        //     } elseif ($user->level == 'user') {
        //         return redirect()->intended('/');
        //     }
        //     return redirect()->intended('login');
        // }


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
    public function postRegis(Request $request)
    {
        $this->validate($request, [
            'nama_depan' => 'required|alpha|max:255',
            'nama_belakang' => 'required|alpha|max:255',
            'email' => 'required|email',
            'password' => 'required|min:6|alpha_num',
            'captcha' => 'required|captcha'
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

        $profil = Profil::create([
            'users_id' => $user->id,
            'nama_depan' => $request->nama_depan,
            'nama_belakang' => $request->nama_belakang,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);


        return redirect('/login')->with('sukses', 'Registrasi Anda berhasil silahkan login');
    }

    // ganti password
    public function postPassword(Request $request, $id)
    {
        $this->validate($request, [
            'password_lama' => 'required',
            'passwordbaru' => 'required|string|min:6',
            'ulangpassword' => 'required|same:passwordbaru'
        ]);

        $user = User::find($id);
        if (Hash::check($request->password_lama, $user->password)) {
            $user->update([
                'password' => bcrypt($request->passwordbaru)
            ]);
            toast('Password Berhasil diubah', 'success');
            return redirect::back();
        } else {
            toast('Password gagal diubah', 'error');
            return redirect::back();
        }
    }
}