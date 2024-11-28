<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Preference extends Model
{
    protected $fillable = [
        'logo',
        'nama_aplikasi',
        'vidio',
        'background_s1',
        'background_s2',
        'background_s3',
        'background_s4',
    ];
}
