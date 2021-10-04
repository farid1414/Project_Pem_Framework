<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    use HasFactory;
    protected $fillable =['admin_id','kategoris_id','judul','gambar','sinopsis','tgl_mulai','tgl_akhir','tgl_tayang','stok','harga','link'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategoris_id', 'id');
    }
}