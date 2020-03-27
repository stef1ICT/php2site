<?php

namespace App\Http\Controllers;

use App\Gender;
use App\Product;
use App\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{


    
    public function index() {
      $femaleProducts = Product::getFemaleProducts();
      $maleProducts = Product::getMaleProducts();
      $femaleCategoryIds = $this->getCategoryIdFromProducts($femaleProducts);
      $maleCategoryIds = $this->getCategoryIdFromProducts($maleProducts);
      $maleCategories = $this->getCategoriesByIds($maleCategoryIds);
      $femaleCategories = $this->getCategoriesByIds($femaleCategoryIds);


     
       return view('Home.index', ['maleProducts'=> $maleCategories[0]->getProductsByGender('Male'),
                                    'femaleProducts' => $femaleCategories[0]->getProductsByGender('Female'),
                                    'femaleCategories' => $femaleCategories,
                                    'maleCategories' => $maleCategories
                                    ]);
    }
    protected function getCategoryIdFromProducts($products) {
        return array_values($products->pluck('category_id')->unique()->toArray());
    }
    protected function getCategoriesByIds($ids) {
        return Category::whereIn('id', $ids)->get();
    }




    public function getProductsByCategoryIdAndProductGender() {
            $category =   Category::where('id', request('categoryId'))->first();
            $products = $category->getProductsByGender(request('genderName'));
            return $products;
    }
}
