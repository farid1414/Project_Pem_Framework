<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DaftarAdmin;
use App\Models\User;
use App\Models\DaftarEvent;
use App\Models\Tiket;
use App\Models\Kategori;
use Hashids\Hashids;
use File;
use DB;
use Illuminate\Support\Facades\App;
use Carbon\Carbon;

class HomeController extends Controller

{

    public function dashboard()
    {
        // Menampilkan tanggal sekarang
        $time = Carbon::Now();
        // {{$time->translatedFormat('l, d F Y')}}
        $tiket = Tiket::with('kategori')->latest()->offset(0)->limit(4)->get();
        return view('/dashboard', compact ('tiket' ,'time'));
    }
    public function viewTiket()
    {
        // Menampilkan tanggal sekarang
        $time = Carbon::Now();
        // {{$time->translatedFormat('l, d F Y')}}
        $tiket = Tiket::with('kategori')->latest()->filter(request(['search','category'])) ->get();
        return view('/tiket', compact ('tiket' , 'time'));
    }

    // public function viewCategori( $id)
    // {
    //     $kategori = Kategori::find($id);

    //     $coba = $kategori->tiket;
    //     if(request('search')){
    //         $coba->where('judul', 'like', '%' . request('search') . '%');
    //     }
    //     $time = Carbon::Now();
    //     return view('/view_categori',compact('kategori','time'));
    // }

    public function postdaftar(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|max:250',
            'nama_perusahaan' => 'required',
            'jasa' =>'required',
            'email' => 'required|email',
            'surat' => 'required|mimetypes:application/pdf|max:10000',
            'logo' => 'required|mimes:jpg,jpeg,png|max:2500',
            'jasa' => 'required',
            'alamat' => 'required'

        ]);

        $gambar = $request->surat;
        $new_gambar = time() . ' - ' . $gambar->getClientOriginalName();

        $logo = $request->logo;
        $new_logo = time() . ' - ' . $logo->getClientOriginalName();

        DaftarAdmin::create([
            'status_id' => 1,
            'nama' => $request->nama,
            'nama_perusahaan' => $request->nama_perusahaan,
            'penyedia' => $request->jasa,
            'email' => $request->email,
            'surat' => $new_gambar,
            'logo' => $new_logo,
            'jasa' => $request->jasa,
            'alamat' => $request->alamat,
        ]);
        $gambar->move('img/surat', $new_gambar);
        $logo->move('img/logo', $new_logo);

        return redirect('/');
    }


    // tampil perusahaan antri admin untuk di generate akun

}