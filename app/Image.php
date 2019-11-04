<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'image';

    protected $primaryKey = 'id';

    public $incrementing = true;

    public $timestamps = false;

    protected $fillable = ['image_name','dir', 'id_proyek'];
}
