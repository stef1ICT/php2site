<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $guarded = [];

    protected $appends = ['main_image', 'path'];

    public function path() {
        return "/{$this->gender->genderName}/{$this->category->categoryName}/{$this->id}";
    }

    public function getPathAttribute() {
        return "{$this->gender->genderName}/{$this->category->categoryName}/{$this->id}";
    }

    public function category() {
        return $this->belongsTo('App\Category');
    }
    public function gender() {
        return $this->belongsTo('App\Gender');
    }
    public function images() {
        return $this->hasMany('App\Image');
    }
    public function getMainImageAttribute() {
        // return 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcR26xXXTzfjNvyTMARQd2dqnlIfEooChekWtq-B7XhtbP3YxVjQ';
      return $this->images->first()->imageUrl;
    }

    public function specifications() {
        return $this->hasMany('App\Specifications');
    }

 

    public function mainPhoto() {
        return $this->images->first()->imageUrl;
        // return 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcR26xXXTzfjNvyTMARQd2dqnlIfEooChekWtq-B7XhtbP3YxVjQ';
         
      
      }

    


    public  static function getMaleProducts() {
        $genderMale = Gender::where('genderName', 'Male')->first();
        $maleProducts = $genderMale->products;
        return $maleProducts;
    }


    public  static function getFemaleProducts() {
        $genderMale = Gender::where('genderName', 'Female')->first();
        $maleProducts = $genderMale->products;

        return $maleProducts;
    }


  

  
}
