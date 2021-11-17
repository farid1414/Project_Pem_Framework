<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use File;
use App\Models\DaftarEvent;
use App\Models\Profil;
use App\Models\Tiket;
use Hashids\Hashids;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{
    //show profil
    public function showProfil($id)
    {
        $decryptID= Crypt::decryptString($id);
        $user = User::findOrFail($decryptID);
        return view('/show_profil', compact('user'));
    }

    public function postProfil(Request $request, $id)
    {
        $user = User::find($id);

        if ($request->has('gambar')) {
            $path = "img/profil/";
            File::delete($path  .  $user->profil->gambar);
            $gambar = $request->gambar;
            $new_gambar = time() . ' - ' . $gambar->getClientOriginalName();
            $gambar->move('img/profil/', $new_gambar);

            $data = [
                'nama_depan' => $request->nama_depan,
                'nama_belakang' => $request->nama_belakang,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tgl_lahir' => $request->tgl_lahir,
                'alamat' => $request->alamat,
                'gambar' => $new_gambar,
            ];
        } else {
            $data = ([
                'nama_depan' => $request->nama_depan,
                'nama_belakang' => $request->nama_belakang,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tgl_lahir' => $request->tgl_lahir,
                'alamat' => $request->alamat,
            ]);
        }

        $user->profil()->update($data);
        toast('Profil Anda Berhasil Diubah', 'success');
        return redirect()->back();
    }

    // post event 
    public function postEvent(Request $request)
    {
        // belum validate
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
        DaftarEvent::create([
            'users_id' => auth()->user()->id,
            'kategoris_id' => $request->kategori_id,
            'status_id' => 1,
            'judul' => $request->judul,
            'gambar' => $new_gambar,
            'sinopsis' => $request->sinopsis,
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_akhir' => $request->tgl_akhir,
            'tgl_tayang' => $request->tgl_tayang,
            'stok' => $request->stok,
            'harga' => $request->harga,
        ]);
        $gambar->move('img/event', $new_gambar);
        toast('Anda berhasil mengupload kerjasama dengan Sonar', 'success');
        return redirect('/');
    }
    // tabel daftar pengajuan event
    public function showPengajuan()
    {
        $event = DaftarEvent::with('kategori')->get();
        $time = Carbon::Now();
        // {{$time->translatedFormat('l, d F Y')}}

        return view('/tabel_pengajuan', compact('event','time'));
    }

    // tabel show untuk edit event
    public function showEvent($id)
    {
        $event = DaftarEvent::find($id);



        return view('/user/show_event', compact('event'));
    }
    // post edit event
    public function editEvent(Request $request, $id)
    {
        $event = DaftarEvent::find($id);

        $this->validate($request, [
            'judul' => 'required',
            'kategoris_id' => 'required',
            'sinopsis' => 'required',
            'tgl_mulai' => 'required',
            'tgl_akhir' => 'required',
            'stok' => 'required',
            'gambar' => 'file|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->has('gambar')) {
            $path = "img/event/";
            File::delete($path  .  $event->gambar);
            $gambar = $request->gambar;
            $new_gambar = time() . ' - ' . $gambar->getClientOriginalName();
            $gambar->move('img/profil/', $new_gambar);

            $data = [
                'judul' => $request->judul,
                'kategoris_id' => $request->kategoris_id,
                'sinopsis' => $request->sinopsis,
                'tgl_mulai' => $request->tgl_mulai,
                'tgl_akhir' => $request->tgl_akhir,
                'tgl_tayang' => $request->tgl_tayang,
                'stok' => $request->stok,
                'gambar' => $new_gambar,
            ];
        } else {
            $data = ([
                'judul' => $request->judul,
                'kategoris_id' => $request->kategoris_id,
                'sinopsis' => $request->sinopsis,
                'tgl_mulai' => $request->tgl_mulai,
                'tgl_akhir' => $request->tgl_akhir,
                'tgl_tayang' => $request->tgl_tayang,
                'stok' => $request->stok,
            ]);
        }

        $event->update($data);
        
        toast('Profil Anda Berhasil Diubah', 'success');
        return redirect()->back();
    }

    // untuk hapus event
    public function hapusEvent(DaftarEvent $DaftarEvent)
    {
        DaftarEvent::destroy($DaftarEvent->id);

        toast('Anda berhasil menghapus pengajuan event', 'success');
        return redirect('/');
    }

    // untuk membuat fungsi membeli tiket
    public function beliTiket(Request $request)
    {
        $id = $request->id_tiket;  

        $tiket =Tiket::find($id);
        $user = Auth()->user()->id;

        if($tiket->user()->where('user_id',$user)->exists()){
            alert()->error('MOHON MAAF','Anda Sudah Mempunyai Tiket Event ini');
            return redirect('/');
        }
       $post= $tiket->user()->attach($user,['email' =>$request->email]);
        alert()->success('Selamat','Anda telah membeli tiket Silahkan cek di fitur tiket saya untuk akses event ');
       return redirect ('/');
    }

    

    // untuk mngakses streaming event
    public function tiketSaya($id)
    {
        $decryptID= Crypt::decryptString($id);
        $user = User::findOrFail($decryptID);
        $time = Carbon::Now();
        return view ('/tiket_saya',compact('user', 'time'));
    }

    public function liveStream($id)
    {
        $decryptID= Crypt::decryptString($id);
        $tiket = Tiket::findOrFail($decryptID);

        return view('/streaming', compact('tiket'));
    }
}