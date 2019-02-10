<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KecamatanDesa extends Model
{
    protected $table = 'kecamatan_desa';

    protected $fillable = ['kecamatan', 'desa'];
}
