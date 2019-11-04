<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'user';

    protected $primaryKey = 'username';

    public $incrementing = false;

    public $timestamps = false;

    protected $fillable = [
        'username','name', 'password', 'last_login',
    ];

}
