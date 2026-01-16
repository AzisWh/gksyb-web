<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EkaristiModel extends Model
{
    use HasFactory;

    protected $table = 'ekaristi_table';

    protected $fillable = [
        'nama_perayaan',
        'ket_perayaan',
        'tanggal',
        'tanggal_mulai',
        'tanggal_akhir',
        'is_publish',
        'file',
    ];
}
