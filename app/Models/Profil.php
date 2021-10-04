<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    use HasFactory;
    protected $fillable = ['users_id', 'nama_depan', 'nama_belakang', 'gambar', 'jenis_kelamin', 'tgl_lahir', 'alamat'];

    public function getGambar()
    {
        if (!$this->gambar) {
            return asset('img/avatar.png');
        }
        return asset('img/profil/' . $this->gambar);
    }

    public function user()
    {
        return $this->belongsTo(User::class, "users_id", "id");
    }
}