<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Daftr_admin;
use App\Models\User;
use File;
use DB;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    public function postdaftar(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|alpha|max:250',
            'email' => 'required|email',
            'surat' => 'required|max:2500',
            'logo' => 'required|mimes:jpg,jpeg,png|max:2500',
            'jasa' => 'required',
            'alamat' => 'required'

        ]);

        $gambar = $request->surat;
        $new_gambar = time() . ' - ' . $gambar->getClientOriginalName();

        $logo = $request->logo;
        $new_logo = time() . ' - ' . $logo->getClientOriginalName();

        Daftr_admin::create([
            'nama' => $request->nama,
            'nama_perushaan' => $request->nama_perushaan,
            'email' => $request->email,
            'surat' => $new_gambar,
            'logo' => $new_logo,
            'jasa' => $request->jasa,
            'alamat' => $request->alamat,
        ]);
        $gambar->move('img/', $new_gambar);
        $logo->move('img/', $new_logo);

        return redirect('/');
    }


    // tampil perusahaan antri admin untuk di generate akun

}