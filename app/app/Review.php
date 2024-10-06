<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'user_id','item_id','title','comment',
    ];

    public function user(){
        return $this->belongsTo('App\User','user_id','item_id','id');
    }
}
