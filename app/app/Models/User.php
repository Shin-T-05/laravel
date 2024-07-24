<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'user_name','name', 'email', 'password','remember_token','role','del_flg','tel','post','address',
    ];
}
