<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoaModel extends Model
{
    use HasFactory;

    protected $table = 'table_doa';

    protected $fillable = [
        'nama',
        'isi_doa',
        'tanggal_doa',
        'status',
    ];
}
