<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $fillable = ['nama'];

    public function daftarevent()
    {
        return $this->hasMany(DaftarEvent::class, 'kategoris_id', 'id');
    }
    public function tiket()
    {
        return $this->hasMany(Tiket::class, 'kategoris_id', 'id');
    }
}