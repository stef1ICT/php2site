<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];




    public function user() {
        return $this->belongsTo('App\User');
    }


    public function orderedProducts() {
        return $this->hasMany('App\OrderedProduct');
    }

    public function orderStatus() {
    return $this->belongsTo('App\OrderStatus');
    }
}
