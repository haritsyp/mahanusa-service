<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyek extends Model
{
    protected $table = 'proyek';

    protected $primaryKey = 'id';

    protected $timestamp = false;

    protected $fillable = ['nama_proyek', 'nilai_proyek', 'jumlah_unit', 'id_kota', 'preview', 'lokasi', 'latitude', 'longitude'];
}
