<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Item;

class Item extends Model
{
    protected $fillable = [
        'user_id','itemname','image','sentence','amount','likes',
    ];

    public function user(){
        return $this->belongsTo('App\user','user_id','id');
    }

    public function review(){
        return $this->hasmany('App\Review','item_id','id');
    }
    public function goods()
    {
      return $this->hasMany('App\Good','item_id','id');
    }

}
