<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    

    public function products() {
        return $this->hasMany('App\Product');
    }


    public function getRouteKeyName()
    {
        return 'genderName';
    }
}
