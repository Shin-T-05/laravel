<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $fillable = [
        'user_id','item_id','itemname','quantity','image','total','date','amount',
    ];

    public function item(){
        return $this->belongsTo('App\Item','item_id','id');
    }
}
