<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karya extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'judul', 
        'kategori', 
        'deskripsi', 
        'foto', 
        'status', 
        'alasan_tolak' // Sesuai dengan nama kolom di database
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    // Relasi ini disesuaikan karena 'kategori' di tabel karyas berisi teks 'nama_kategori'
    public function category() {
        return $this->belongsTo(Kategori::class, 'kategori', 'nama_kategori');
    }
}