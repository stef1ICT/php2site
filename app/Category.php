<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    

   
    protected $guarded = [];

    public function products() {
        return $this->hasMany('App\Product')->with('gender');
    }


    public function getProductsByGender($genderName) {
        $genderId =    Gender::where('genderName', $genderName)->first()->id;
        return $this->products->where('gender_id', $genderId);
    }
   



    public function getRouteKeyName()
    {
        return 'categoryName';
    }
}
