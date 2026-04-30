<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    // Pastikan fillable-nya sesuai dengan kolom di database kamu
    protected $fillable = ['nama_kategori', 'slug'];

    // Relasi ke Karya (Satu kategori punya banyak karya)
    public function karyas()
    {
        return $this->hasMany(Karya::class, 'kategori');
    }
}