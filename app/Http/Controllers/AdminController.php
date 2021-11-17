<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use \App\Models\DaftarAdmin;
use \App\Models\DaftarEvent;
use \App\Models\Admin;
use \App\Models\Tiket;
use App\Models\Kategori;
use App\Models\Genre;
use App\Models\User;
use App\Models\Platform;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use SimpleSoftwareIO\QrCode\Generator;
use File;

class AdminController extends Controller
{
    // menampilkan menu dashboard
    public function dashboard()
    {
        
        $jml_tiket = Tiket::with('kategori')->get();
        $admin = DaftarAdmin::where('status_id',1)->count();
        $perusahaan = DaftarAdmin::where('status_id',2)->count();
        $event=DaftarEvent::where('status_id',1)->count();
        return view('/admin/dashboard_admin',compact('admin','perusahaan','jml_tiket','event'));
    }
    // menampilkan edit password
    public function passAdmin($id)
    {
        $admin =Admin::find($id);
        return view ('/admin/view_pass_admin',compact('admin'));
    }
    // untuk mengganti password admin
    public function posPass(Request $request, $id)
    {
        $this->validate($request, [
            'password_lama' => 'required',
            'passwordbaru' => 'required|string|min:6',
            'ulangpassword' => 'required|same:passwordbaru'
        ]);

        $admin = Admin::find($id);
        if (Hash::check($request->password_lama, $admin->password)) {
            $admin->update([
                'password' => bcrypt($request->passwordbaru)
            ]);
            return redirect ('/admin')->with('sukses','Password anda berhasil dirubah');
        } else {
            toast('Password gagal diubah', 'error');
            return redirect::back()->with('gagal','Password anda gagal dirubah');
        }
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
        $admin->penyedia =$request->penyedia;
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
        return redirect('/admin');
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


    // ADMIN PERUSAHAAN 


    public function daftarTiket()
    {
        $tiket =Tiket::with('kategori')->get();
        $genre =Genre::all();
        $platform =Platform::all();
        return view ('/admin/daftar_tiket', compact('tiket','genre','platform'));
    }

    // untuk mengupload tiket
    public function postTiket(Request $request)
    {
        $admin =Auth::guard('admin')->user()->id;
        $this->validate($request, [
            'judul' => 'required',
            'kategori_id' => 'required',
            'sinopsis' => 'required',
            'tgl_mulai' => 'required',
            'tgl_akhir' => 'required',
            'tgl_tayang' => 'required',
            'stok' => 'required',
            'gambar' => 'required|file|image|mimes:jpeg,png,jpg|max:5048'
        ]);

        $gambar = $request->gambar;
        $new_gambar = time() . ' - ' . $gambar->getClientOriginalName();
        Tiket::create([
            'admin_id' => $admin,
            'kategoris_id' => $request->kategori_id,
            'genre_id' =>$request->genre,
            'judul' => $request->judul,
            'gambar' => $new_gambar,
            'sinopsis' => $request->sinopsis,
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_akhir' => $request->tgl_akhir,
            'tgl_tayang' => $request->tgl_tayang,
            'harga' => $request->harga,
            'stok' => $request->stok,
        ]);
        $gambar->move('img/event', $new_gambar);
        
        toast('Anda berhasil mengupload Tiket', 'success');
        return redirect()->back();
    }

    // untuk menampilkan daftar tiket 
    public function lihatTiket($id)
    {

        $time = Carbon::Now();
        $kategori =Kategori::find($id);

        return view ('/admin/view_film',compact('kategori','time'));
    }

    public function hapusTiket(Tiket $Tiket)
    {
        Tiket::destroy($Tiket->id);

        toast('Anda berhasil menghapus Tiket', 'success');
        return redirect()->back();
    }
    
    public function dataJual(Tiket $tiket)
    {
        // $tiket = Tiket::find($id);
        return view('/admin/data_jual_tiket',compact('tiket'));
    }
    public function code($id)
    {
        $tiket = Tiket::find($id);

        return view('/admin/code',compact('tiket'));
    }

    // melihatd aftar admin perusahaan
    public function daftarPerusahaan()
    {
        $admin = Admin::where('level','perusahaan')->get();

        return view('/admin/data_admin_perusahaan', compact('admin'));
    }


    public function buatCode(Request $request, $id)
    {
        $user = User::find($id);
        $code =Str::random(10);

        $user->tiket()->updateExistingPivot($request->id,['code' =>$code]);
        $qrcode = new Generator;
        $qr = $qrcode->size(500)->generate($code);

        // \Mail::raw('Selamat ' . $user->name . ' Anda telah membeli tiket kami: ' . $code, function ($message) use ($user) {
        //     $message->to($user->email, $user->name);
        //     $message->subject('Selamat anda tergabung dalam web kami ');
        // });


        return redirect::back()->with( ['qr' => $qr] );
    }

    public function postLink(Request $request)
    {
        $id_tiket = $request->id;
        $tiket =Tiket::find($id_tiket);

        // $data =[
        //     'platform_id' =>$request->platform_id,
        //     'link' =>$request->link,
        // ];

      
        
        if ($request->has('video')) {
            $path = "video/";
            File::delete($path  .  $tiket->video);
            $video = $request->video;
            $new_video = time() . ' - ' . $video->getClientOriginalName();
            $video->move('video/', $new_video);

            $data = [
                'platform_id' =>$request->platform_id,
                'link' =>$new_video,
            ];
        } else {
            $data = ([
                'platform_id' =>$request->platform_id,
                'link' =>$request->link,
            ]);
        }
        $tiket->update($data);
        toast('Anda berhasil upload', 'success');
        return redirect::back();
    }
}