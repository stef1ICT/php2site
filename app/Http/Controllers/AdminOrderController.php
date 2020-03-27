<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    


    public function index() {
        $this->authorize('isAdmin');

        $orders = Order::latest()->paginate(1);

       


        return view('Admin.Order.index', ['orders'=>$orders]);
    }



    public function changeOrderStatus() {

        $orderId = request('orderId');
        $statusId = request('statusId');

        $order = Order::where('id', $orderId)->first();
        $order->order_status_id = $statusId;
        $order->save();

        $response = ['statusCode' => 200];
        return $response;
    }
}
