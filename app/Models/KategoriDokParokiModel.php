<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriDokParokiModel extends Model
{
    use HasFactory;

    protected $table = 'kategori_dokparoki';

    protected $fillable = [
        'nama_kategori',
    ];

    public function dokumen()
    {
        return $this->hasMany(DokParokiModel::class, 'kategori_id');
    }
}
