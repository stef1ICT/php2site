@extends('master.app')

@section('content')

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                        <a href="./shop.html">Shop</a>
                        <span>Check Out</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Shopping Cart Section Begin -->
    <section class="checkout-section spad">
        <div class="container">
            <form action="/order"  method="POST" class="checkout-form">
                <div class="row">
                    <div class="col-lg-6">
                        @csrf
                        <h4>Biiling Details</h4>
                        <div class="row">
                           
                          
                          
                            <div class="col-lg-12">
                                <label for="street">Street Address<span>*</span></label>
                                <input type="text" name="street" id="street" class="street-first">
                            </div>
                            <div class="col-lg-12">
                                <label for="street">Town<span>*</span></label>
                                <input type="text" name="town" id="street" class="town">
                            </div>
                            <div class="col-lg-12">
                                <label for="street">Phone<span>*</span></label>
                                <input type="text"  name="phone" id="street" class="town">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                       
                        <div class="place-order">
                            <h4>Your Order</h4>
                            <div class="order-total">
                                <ul class="order-table">
                                    <li>Product <span>Total</span></li>
                                    @foreach ($products as $product)
                                    <li class="fw-normal">{{$product->name}} x {{$product->quantity}} <span>${{$product->price * $product->quantity}}.00</span></li>
                                    @endforeach
                                   
                                <li class="fw-normal">Subtotal <span>${{$totalPrice}}</span></li>
                                    <li class="total-price">Total <span>${{$totalPrice}}</span></li>
                                </ul>
                               
                                </div>
                                <div class="order-btn">
                                    <button type="submit" class="site-btn place-btn">Place Order</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- Shopping Cart Section End -->

    @endsection