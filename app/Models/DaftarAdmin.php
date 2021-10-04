<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarAdmin extends Model
{
    use HasFactory;
    protected $fillable = ['status_id', 'nama', 'nama_perusahaan', 'email', 'surat', 'logo', 'jasa', 'alamat'];

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id', 'id');
    }
}