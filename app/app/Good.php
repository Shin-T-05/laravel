<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Good;

class Good extends Model
{
    protected $fillable = [
        'user_id','item_id',
    ];

    public function item(){
        return $this->belongsTo('App\item','item_id','id');
    }

    public function user(){
        return $this->belongsTo('App\User','user_id','id');
    }

    public function good_exist($user_id, $item_id) {        
        return Good::where('user_id', $user_id)->where('item_id', $item_id)->exists();       
    }
}
