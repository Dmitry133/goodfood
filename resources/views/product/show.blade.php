@extends('layouts.main')

@section('custom_css')
    <link rel="stylesheet" type="text/css" href="{{asset('styles/product.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('styles/product_responsive.css')}}">
@endsection

@section('content')
    <div class="home">
        <div class="home_container">
            <div class="home_background" style="background-image:url({{asset('images/categories.jpg')}}"></div>
            <div class="home_content_container">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="home_content">
                                <div class="home_title">{{$product->name}}<span>.</span></div>
                                <div class="home_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie eros. Sed viverra velit venenatis fermentum luctus.</p></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Product Details -->

    <div class="product_details">
        <div class="container">
            <div class="row details_row">

                <!-- Product Image -->
                <div class="col-lg-6">
                    <div class="details_image">
                        <div class="details_image_large"><img src="{{asset($product->imagepath)}}" alt=""><div class="product_extra product_new"><a href="{{route('showCategory',$product->category['title'])}}">{{$product->category['title']}}</a></div></div>
                        <div class="details_image_thumbnails d-flex flex-row align-items-start justify-content-between">
                        </div>
                    </div>
                </div>

                <!-- Product Content -->
                <div class="col-lg-6">
                    <div class="details_content">
                        <div class="details_name" data-id="{{$product->id}}">{{$product->name}}</div>
                        @if($product->new_price != null)
                            <div class="details_discount">{{$product->price}} RUB</div>
                            <div class="details_price">{{$product->new_price}} RUB</div>
                        @else
                            <div class="product_price">{{$product->price}} RUB</div>
                        @endif

                        <!-- In Stock -->
                        <div class="in_stock_container">
                            <div class="availability">Availability:</div>
                            @if($product->in_stock)
                                <span>Доступен к заказу</span>
                            @else
                                <span style="color: #dc3545!important;">Нет в наличии</span>
                            @endif
                        </div>
                        <div class="details_text">
                            <p>{{$product->description}}</p>
                            <div class="row">
                            <p class="m-3" style="color:black">kCal: {{$product->kCal}}</p>
                            <p class="m-3" style="color:black">Protein: {{$product->protein}}</p>
                            <p class="m-3" style="color:black">Fats: {{$product->fats}}</p>
                            <p class="m-3" style="color:black">Carbohydrates: {{$product->carbohydrates}}</p>
                            </div>
                        </div>
                        @if($user_id !== 0)
                        <div class="btn btn-success"><a href="{{url('/prodcreate/edit/'.$product->id.'')}}">Edit Product</a></div>
                        {!! Form::open(['route'=>['delprod',$product->id]]) !!}
                        {!! Form::hidden('_method','POST') !!}
                        <button type="submit" class="btn btn-danger">DELETE</button>
                        {!! Form::close() !!}
                        @endif
{{--                        <div class="btn btn-danger"><a href="#">Delete Product</a></div>--}}
                        <!-- Product Quantity -->
                        <div class="product_quantity_container">
                            <div class="product_quantity clearfix">
                                <span>Qty</span>
                                <input id="quantity_input" type="text" pattern="[0-9]*" value="1">
                                <div class="quantity_buttons">
                                    <div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fa fa-chevron-up" aria-hidden="true"></i></div>
                                    <div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fa fa-chevron-down" aria-hidden="true"></i></div>
                                </div>
                            </div>
                            <div class="button cart_button"><a href="#">Add to cart</a></div>
                        </div>

                        <!-- Share -->
                        <div class="details_share" style="padding-bottom: 35px">
                            <span>Share:</span>
                            <ul>
                                <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
@section('custom_js')
    <script src="{{asset('js/product.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('.cart_button').click(function (event){
                event.preventDefault()
                addToCart()
            })
        });



        function addToCart(){
            let id = $('.details_name').data('id')
            let qty = parseInt($('#quantity_input').val())

            let total_qty = parseInt($('.cart-qty').text())
            total_qty += qty
            $('.cart-qty').text(total_qty)

            $.ajax({
                url: "{{route('addToCart')}}",
                type: "POST",
                data: {
                    id: id,
                    qty: qty,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: (data) => {
                    console.log(data)
                },
                error: (data) => {
                    console.log(data)
                }
            });
        }
    </script>
@endsection
