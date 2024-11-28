<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tamu extends Model
{
    protected $fillable = [
        'bidang',
        'nama',
        'no_hp',
        'email',
        'Instansi_asal',
        'tujuan',
        'posisi_id',
        'tanggal',
        'status',
    ];
}
