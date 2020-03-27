<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpecificationsType extends Model
{


    protected $guarded = [];
    public function specifications() {
        return $this->belongsToMany('App\Specifications');
    }
}
