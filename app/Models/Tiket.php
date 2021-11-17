<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Tiket extends Model
{
    use HasFactory;
    protected $fillable =['admin_id','kategoris_id','genre_id','judul','gambar','sinopsis','tgl_mulai','tgl_akhir','tgl_tayang','stok','harga','platform_id', 'link'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('judul', 'like', '%' . $search . '%')
                         ->orWhere('sinopsis', 'like', '%' . $search . '%');
        });

        $query->when($filters['category'] ?? false, function($query, $category){
            return $query->WhereHas('kategori', function($query) use ($category) {
                $query->where('id', $category);
            });
        });
    }

    public function getMulai()
    {
        return Carbon::parse($this->attributes['tgl_mulai'])
        ->translatedFormat('l, d F Y');
    }
    public function getAkhir()
    {
        return Carbon::parse($this->attributes['tgl_akhir'])
        ->translatedFormat('l, d F Y');
    }
    public function getTayang()
    {
        return Carbon::parse($this->attributes['tgl_tayang'])
        ->translatedFormat('l, d F Y H:i:s');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategoris_id', 'id');
    }
    public function genre()
    {
        return $this->belongsTo(Genre::class, 'genre_id', 'id');
    }
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id', 'id');
    }
    public function user()
    {
        return $this->belongsToMany(User::class)->withPivot('email','code');
    }
}