<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use \App\Models\DaftarAdmin;
use \App\Models\DaftarEvent;
use \App\Models\Admin;
use \App\Models\Tiket;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    // menampilkan menu dashboard
    public function dashboard()
    {
        return view('/admin/dashboard_admin');
    }

    // menampilkan menu dafatr antrian admin 
    public function daftarAdmin()
    {
        $daftar_antri = DaftarAdmin::all()->sortByDesc('created_at');
        return view('/admin/daftar_perusahaan', compact('daftar_antri'));
    }

    // menampilkan menu daftar antrian untuk pengajuan event
    public function daftarEvent()
    {
        $daftarEvent = DaftarEvent::all()->sortByDesc('created_at');
        return view('/admin/daftar_event', compact('daftarEvent'));
    }
    // melihat detail perusahaan yang mendaftar
    public function generate_akun($id)
    {
        $antri_admin = DaftarAdmin::find($id);

        return view('/admin/generate_akun', compact('antri_admin'));
    }
    // generate akun admin perusahaan serta mengirimkan email dan password melalui email 
    public function post_generate(Request $request, $id)
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

        $daftar_admin = DaftarAdmin::find($id);

        $data = [
            'status_id' => 2,
        ];

        $daftar_admin->update($data);

        toast('Anda Berhasil Membuat akun admin perusahan ', 'success');
        return redirect('/admin/daftar_antri_admin');
    }

    // untuk meliihat detail event
    public function detailEvent($id)
    {
        $event =DaftarEvent::find($id);

        return view('/admin/detail_event',compact('event'));
    }

    // untuk post menjadi tiket event
    public function postEvent(Request $request, $id)
    {
        $admin =Auth::guard('admin')->user()->id;
        Tiket::create([
            'admin_id' => $admin,
            'kategoris_id' => $request->kategori_id,
            'judul' => $request->judul,
            'gambar' => $request->gambar,
            'sinopsis' => $request->sinopsis,
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_akhir' => $request->tgl_akhir,
            'tgl_tayang' => $request->tgl_tayang,
            'harga' => $request->harga,
            'stok' => $request->stok,
        ]);
        $event =DaftarEvent::find($id);

        $data =[
            'status_id' =>2,
        ];

        $event->update($data);

        toast('Anda Berhasil Membuat tiket event', 'success');
        return redirect('/admin');
    }
}