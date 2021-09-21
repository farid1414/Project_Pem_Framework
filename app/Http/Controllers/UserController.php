<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //show profil
    public function showProfil($id)
    {
        $user = User::find($id);
        return view('/show_profil', compact('user'));
    }

    public function postProfil(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $gambar = $request->gambar;
        $new_gambar = time() . ' - ' . $gambar->getClientOriginalName();

        $user->profil()->where('id', $user->profils_id)([
            $post_profil = ([
                'nama_depan' => $request->nama_depan,
            ]);
        ]);

        $user->profil()->update($post_profil);
        return redirect('/');
    }
}