@extends('layouts.main')

@section('custom_css')
    <link rel="stylesheet" type="text/css" href="{{asset('styles/cart.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('styles/cart_responsive.css')}}">
@endsection


@section('content')
    <div class="home">
        <div class="home_container">
            <div class="home_background" style="background-image:url(images/cart.jpg)"></div>
            <div class="home_content_container">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="home_content">
                                <div class="breadcrumbs">
                                    <ul>
                                        <li><a href="{{route('home')}}">Home</a></li>
                                        <li>Shopping Cart</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Cart Info -->
    <div class="cart_info">
        <div class="container">
            <div class="row">
                <div class="col">
                    <!-- Column Titles -->
                    <div class="cart_info_columns clearfix">
                        <div class="cart_info_col cart_info_col_product">Product</div>
                        <div class="cart_info_col cart_info_col_price">Price</div>
                        <div class="cart_info_col cart_info_col_quantity">Quantity</div>
                        <div class="cart_info_col cart_info_col_total">Total</div>
                    </div>
                </div>
            </div>
            <div class="row cart_items_row">
                <div class="col">
                    @foreach($products as $product)
                    <!-- Cart Item -->
                    <div class="cart_item d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start">
                        <!-- Name -->
                        <div class="cart_item_product d-flex flex-row align-items-center justify-content-start">
                            <div class="cart_item_image">
                                <div><img src="images/product_8.jpg" alt=""></div>
                            </div>
                            <div class="cart_item_name_container">
                                <div class="cart_item_name" data-id="{{$product->id}}"><a href="#">{{$product->name}}</a></div>
{{--                                <div class="cart_item_edit"><a href="#">Edit Product</a></div>--}}
                            </div>
                        </div>
                        <!-- Price -->
                        <div class="cart_item_price">{{$product->price}} RUB</div>
                        <!-- Quantity -->
                        <div class="cart_item_quantity">
                            <div class="product_quantity_container">
                                <div class="product_quantity clearfix">
                                    <span>Qty:  {{$product->quantity}}</span>
{{--                                    <input id="quantity_input" data- type="text" pattern="[0-9]*" value="1">--}}
{{--                                    <div class="quantity_buttons">--}}
{{--                                        <div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fa fa-chevron-up" aria-hidden="true"></i></div>--}}
{{--                                        <div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fa fa-chevron-down" aria-hidden="true"></i></div>--}}
{{--                                    </div>--}}
                                </div>
                            </div>
                        </div>
                        <!-- Total -->
                        <div class="cart_item_total">{{$product->getPriceSum()}}</div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="row row_cart_buttons">
                <div class="col">
                    <div class="cart_buttons d-flex flex-lg-row flex-column align-items-start justify-content-start">
                        <div class="cart_buttons_right ml-lg-auto">
                            <div class="button clear_cart_button"><a href="#">Clear cart</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row_extra">
                <div class="col-lg-4">

                    <!-- Delivery -->
                    <div class="delivery">
                        <div class="section_title">Ordering data</div>
                        <div class="section_subtitle">Please enter your phone number and email, we will contact you.</div>
                        <div class="delivery_options">
                            <label class="clearfix">Phone
                                <input type="tel" name="phone" size="40">
                            </label>
                            <label class="clearfix">Email
                                <input type="email" name="email" size="40">
                            </label>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 offset-lg-2">
                    <div class="cart_total">
                        <div class="section_title">Cart total</div>
                        <div class="section_subtitle">Final info</div>
                        <div class="cart_total_container">
                            <ul>
                                <li class="d-flex flex-row align-items-center justify-content-start">
                                    <div class="cart_total_title">Total</div>
                                    <div class="cart_total_value ml-auto">{{$total}}</div>
                                </li>
                            </ul>
                        </div>
                        <div class="button checkout_button"><a href="#">To Order</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('custom_js')
    <script src="js/cart.js"></script>
{{--    <script>--}}
{{--        $(document).ready(function () {--}}
{{--            $('#quantity_input').change(function (event){--}}
{{--                event.preventDefault()--}}
{{--                addToCart()--}}
{{--            })--}}
{{--        });--}}

{{--        function addToCart(){--}}
{{--            let id = $('.cart_item_name').data('id')--}}
{{--            let qty = parseInt($('#quantity_input').val())--}}

{{--            let total_qty = parseInt($('.cart-qty').text())--}}
{{--            total_qty += qty--}}
{{--            $('.cart-qty').text(total_qty)--}}

{{--            $.ajax({--}}
{{--                url: "{{route('addToCart')}}",--}}
{{--                type: "POST",--}}
{{--                data: {--}}
{{--                    id: id,--}}
{{--                    qty: qty,--}}
{{--                },--}}
{{--                headers: {--}}
{{--                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
{{--                },--}}
{{--                success: (data) => {--}}
{{--                    console.log(data)--}}
{{--                },--}}
{{--                error: (data) => {--}}
{{--                    console.log(data)--}}
{{--                }--}}
{{--            });--}}
{{--        }--}}
{{--    </script>--}}
@endsection
