<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'user_id','item_id',
    ];

    public function user(){
        return $this->belongsTo('App\user','user_id','item_id','id');
    }

    public function history(){
        return $this->belongsTo('App\history','user_id','item_id','id');
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
