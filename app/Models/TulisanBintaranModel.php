<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TulisanBintaranModel extends Model
{
    use HasFactory;

    protected $table = 'tulisan_bintaran';

    protected $fillable = [
        'judul_tulisan',
        'kategori_bintaran_id',
        'ringkasan',
        'image',
        'konten',
        'is_published',
    ];

    public function kategoriBintaran()
    {
        return $this->belongsTo(KategoriBintaranModel::class, 'kategori_bintaran_id');
    }
}
