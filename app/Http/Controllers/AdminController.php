<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use \App\Models\Daftr_admin;
use \App\Models\Admin;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function dashboard()
    {
        $pass = Str::random(6);
        return view('/admin/dashboard_admin', compact('pass'));
    }

    public function daftar_antri_admin()
    {
        $daftar_antri = Daftr_admin::all()->sortByDesc('created_at');
        return view('/admin/daftar_perusahaan', compact('daftar_antri'));
    }
    // melihat detail perusahaan yang mendaftar
    public function generate_akun($id)
    {
        $antri_admin = Daftr_admin::find($id);

        return view('/admin/generate_akun', compact('antri_admin'));
    }
    // generate akun perusahaan
    public function post_generate(Request $request)
    {
        $pass = Str::random(6);

        $admin = new \App\Models\Admin;
        $admin->name = $request->nama;
        $admin->email = $request->email;
        $admin->level = "perusahaan";
        $admin->password = bcrypt($pass);
        $admin->remember_token = Str::random(60);
        $admin->save();

        \Mail::raw('Selamat ' . $admin->name . ' Anda tergabung dalam SONAR (See All Concert and Art) Silahkan upload tiket anda Email Anda: ' . $admin->email .  '  password anda:  ' . $pass, function ($message) use ($admin) {
            $message->to($admin->email, $admin->nama);
            $message->subject('Selamat anda tergabung dalam web kami ');
        });

        return redirect::back()->with('sukses', 'Registrasi berhasil silahkan login');
    }
}