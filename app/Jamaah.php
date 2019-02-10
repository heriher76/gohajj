<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jamaah extends Model
{
    protected $table = 'jamaah';

    protected $fillable = ['nama', 'tempat_tanggal_lahir', 'alamat', 'telephone', 'kecamatan', 'desa', 'kloter', 'no_paspor', 'tahun'];
}
