<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specifications extends Model
{
    protected $guarded = [];
    
    public function product() {
        return $this->belongsTo('App\Product');
    }

    public function specifications_type() {
        return $this->belongsTo('App\SpecificationsType');
    }
}
