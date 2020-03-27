<?php

namespace App\Http\Controllers;

use App\Product;
use ArrayIterator;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addProduct() {


        if(!auth()->check()) {
            return ['code' => 401];
        }

        //     session()->forget('totalQuantity');
        //     session()->forget('totalPrice');
        //     session()->forget('cartProducts');
        // return [];
   

        $productId = request('productId');
        $products = session()->get('cartProducts',[]);
         $product = Product::where('id', $productId)->first();

         $product->quantity = 1;
          $iteration = new ArrayIterator($products);
          $productPosition = -1;
          $totalQuantity = 0;
          $totalPrice = 0;
         foreach($iteration as $item) {
            if($item->id == $product->id) {
                $productPosition = iterator_count($iteration);
            }
            $totalPrice += $item->quantity * $item->price;
            $totalQuantity += $item->quantity;
         }
         if($productPosition !== -1) {
          $quantity = $products[$productPosition-1]->quantity + 1;
          $product->quantity = $quantity;
          $products[$productPosition-1] = $product;  
         } else {
            $product->quantity = 1;
            $products[] = $product;
         }
         $totalQuantity++;
         $totalPrice+=$product->price;
         
        session()->put('cartProducts', $products);
        session()->put('totalQuantity', $totalQuantity);
        session()->put('totalPrice', $totalPrice);
        return ['products' => $products];
    }





    public function removeProduct() {

        $productId = request('productId');
        $products = session()->get('cartProducts');
        $iteration = new ArrayIterator($products);
        $totalQuantity =  session()->get('totalQuantity');
        $totalPrice = session()->get('totalPrice');
        $productPosition = -1;
        foreach($iteration as $item) {
            if($item->id == $productId) {
                $productPosition = iterator_count($iteration) - 1;
            }
         }

        $product = $products[$productPosition];
        $totalQuantity =  $totalQuantity - $product->quantity;
        $totalPrice = $totalPrice - $product->price*$product->quantity;
        array_splice($products, $productPosition, 1);

        session()->put('cartProducts', $products);
        session()->put('totalQuantity', $totalQuantity);
        session()->put('totalPrice', $totalPrice);


        return [ 
            'products' => $products,
            'totalQuantity' => $totalQuantity,
            'totalPrice' => $totalPrice
            ];

    }


    public function updateQuantity() {
       
        $totalQuantity =   session()->get('totalQuantity');
        $totalPrice = session()->get('totalPrice');
        $productId = request('productId');
        $type = request('type');
        $products = session()->get('cartProducts');
        $iteration = new ArrayIterator($products);
        $productPosition = -1;
        foreach($iteration as $item) {
            if($item->id == $productId) {
                $productPosition = iterator_count($iteration) - 1;
            }
         }
         $selectedProduct =  $products[$productPosition];
        if($type == 'inc') {
           
            $products[$productPosition]->quantity++;
            $totalQuantity++;
            $totalPrice+=$selectedProduct->price;
        } else {
           if($products[$productPosition]->quantity == 1) {
            return ['error' => 419];
           }
            $totalQuantity--;
            $products[$productPosition]->quantity--;
            $totalPrice-=$selectedProduct->price;
        }

        session()->put('cartProducts', $products);
        session()->put('totalQuantity', $totalQuantity);
        session()->put('totalPrice', $totalPrice);

        return ['products' => $products, 'totalPrice' => $totalPrice];
    }
}
