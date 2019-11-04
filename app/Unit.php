<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $table = 'unit';

    protected $primaryKey = 'id';

    public $incrementing = true;

    public $timestamps = false;

    protected $fillable = ['tipe','jumlah_unit', 'harga_jual','setoran_awal','id_proyek'];
}
