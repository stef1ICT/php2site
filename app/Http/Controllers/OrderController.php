<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderedProduct;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    


    public function shoppingCard() {


        $productsForOrder = session()->get('cartProducts');

        return view('Order.shopping-cart', [
            'productsForOrder' => $productsForOrder
        ]);
    }



    public function checkout() {

        $productsForOrder = session()->get('cartProducts',[]);
        $totalPrice =   session()->get('totalPrice', 0);

     return view('Order.check-out', [
         'products' => $productsForOrder,
        'totalPrice' => $totalPrice
         ]);

}


public function store() {
    
    $totalPrice = session()->get('totalPrice');
    $orderedProducts = session()->get('cartProducts');
    $order = Order::create([
        'user_id' => auth()->user()->id,
        'street' => request('street'),
        'town' => request('town'),
        'phone' => request('phone'),
        'totalPrice' => $totalPrice
    ]);

    foreach($orderedProducts as $product) {
        OrderedProduct::create([
            'order_id' => $order->id,
            'product_id' => $product->id,
            'quantity' => $product->quantity
        ]);
    }
    session()->put('cartProducts', []);
    session()->put('totalQuantity', 0);
    session()->put('totalPrice', 0);
    return redirect('/');
}



public function userOrders() {

    $orders = auth()->user()->orders()->latest()->get();
    
    return view('Order.user-orders',['orders'=>$orders]);
}





}