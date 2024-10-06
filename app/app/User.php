<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    protected $fillable = [
        'user_name','name', 'email', 'password','remember_token','role','del_flg','tel','post','address',
    ];

    use Notifiable;

    public function goods()
{
    return $this->hasMany(Good::class);
}

public function histories()
    {
        return $this->hasMany(History::class);
    }
}