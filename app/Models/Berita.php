<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $fillable = ['judul', 'isi', 'gambar', 'kategori_id', 'user_id', 'status'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

