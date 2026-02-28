<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori'; 
    protected $primaryKey = 'id_kategori'; 
    public $incrementing = true;
    protected $keyType = 'int';
    protected $fillable = ['nama_kategori'];

    public function artikels()
    {
        return $this->hasMany(\App\Models\artikel::class, 'kategori_id', 'id_kategori');
    }
}
