<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    protected $table = 'status';
    protected $fillable = ['nama'];

    public function daftar_admin()
    {
        return $this->hasMany(Daftar_Admin::class, 'status_id', 'id');
    }
}