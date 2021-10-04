<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class DaftarEvent extends Model
{
    use HasFactory;

    protected $fillable = ['users_id', 'kategoris_id', 'status_id', 'judul', 'gambar', 'sinopsis', 'tgl_mulai', 'tgl_akhir', 'tgl_tayang', 'stok', 'harga'];

    protected $with = ['kategori'];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategoris_id', 'id');
    }

    public function getStart()
    {
        return Carbon::parse($this->attributes['tgl_mulai'])
            ->translatedFormat('l, d F Y');
    }
    public function getClose()
    {
        return Carbon::parse($this->attributes['tgl_akhir'])
            ->translatedFormat('l, d F Y');
    }

    public function getEvent()
    {
        return Carbon::parse($this->attributes['tgl_tayang'])
            ->translatedFormat('l, d F Y H:i:s');
    }
}