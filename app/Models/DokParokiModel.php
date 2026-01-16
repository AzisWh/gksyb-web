<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokParokiModel extends Model
{
    use HasFactory;

    protected $table = 'dokparoki';

    protected $fillable = [
        'judul_dokumen',
        'kategori_id',
        'keterangan',
        'file',
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriDokParokiModel::class, 'kategori_id');
    }
}
