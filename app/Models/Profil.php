<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'nama_depan', 'nama_belakang', 'gambar', 'jenis_kelamin', 'tgl_lahir', 'alamat'];
}