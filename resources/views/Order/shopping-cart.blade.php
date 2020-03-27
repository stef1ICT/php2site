@extends('master.app')


@section('content')

    <!-- Breadcrumb Section Begin -->
    @include('Order.__includes.breadcrumb-section')
    <!-- Breadcrumb Section Begin -->

    <!-- Shopping Cart Section Begin -->
@include('Order.__includes.shopping-cart-section')
    <!-- Shopping Cart Section End -->

@endsection