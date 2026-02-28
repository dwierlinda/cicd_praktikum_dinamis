<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;

    protected $table = 'artikels';

    protected $fillable = [
        'kategori',
        'judul',
        'slug',
        'isi',
        'gambar',
        'penulis',
        'is_featured',
        'dibaca',
    ];

    public function kategori()
    {
        return $this->belongsTo(\App\Models\Kategori::class, 'kategori_id', 'id_kategori');
    }
}
