<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    use HasFactory;
    protected $fillable = ['nama_depan', 'nama_belakang', 'gambar', 'jenis_kelamin', 'tgl_lahir', 'alamat'];

    public function getGambar()
    {
        if (!$this->gambar) {
            return asset('img/avatar.png');
        }
        return asset('img/' . $this->gambar);
    }

    public function user()
    {
        return $this->hasOne('App\Models\User');
    }
}