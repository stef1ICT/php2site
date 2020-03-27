<?php

namespace App\Http\Controllers;

use App\Category;
use App\Gender;
use App\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    



    public function index(Gender $gender = null) {
        
       
        if($gender == null) {
            $products = Product::paginate(6);
        } else {
            $products = $gender->products()->paginate(6);
            $gender = $gender->id;
        }
       
        return view('Product.index',
        ['products'=> $products, 'gender' => $gender]
    );
    }



    public function show(Gender $gender, Category $category, Product $product) {
        $relatedProducts = Product::inRandomOrder()->where('category_id', $category->id)->
        where('gender_id', $gender->id)->where('id', '!=', $product->id)->
        take(4)->get();
        return view('Product.show', 
        [
            'product' => $product,
            'relatedProducts' => $relatedProducts
        ]);
    }

    public function getFilterProducts() {
        $gender = request('gender');
        $categories = request('categories') == null ? null : explode(',', request('categories')); 
        $minPrice = request('minPrice');
        $maxPrice = request('maxPrice');
        $products = Product::query();
        if($gender != 'all') {
            $products = $products->where('gender_id', $gender);
        }       
        if($categories) {
            $products = $products->whereIn('category_id', $categories);
        }
        $products = $products->whereBetween('price',[$minPrice,$maxPrice]);
        $products = $products->get();
        return $products;
    }
    public function search() {
      $searchWord = request('search-word');
        $productsNameMatch =  collect(Product::where('name', 'like', '%' . $searchWord . '%')->get());
        $productDescriptionMatch = collect(Product::where('description', 'like', '%' . $searchWord . '%')->get());
      $products =  $productsNameMatch->merge($productDescriptionMatch)->unique();
      return view('Product.search', ['products'=>$products]);
    }
}
