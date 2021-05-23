@extends('layouts.main')


@section('content')


    <!-- Ads -->

    <div class="avds" style="padding-top: 145px">
        <div class="avds_container d-flex flex-lg-row flex-column align-items-start justify-content-between">
            <div class="avds_small">
                <div class="avds_background" style="background-image:url(images/avds_small.jpeg)"></div>
                <div class="avds_small_inner">
                    <div class="avds_discount_container">
                        <img src="images/discount.png" alt="">
                        <div>
                            <div class="avds_discount">
                                <div>20<span>%</span></div>
                                <div>Discount</div>
                            </div>
                        </div>
                    </div>
                    <div class="avds_small_content">
                        <div class="avds_title">FoodBox's</div>
                        <div class="avds_link"><a href="{{route('showCatAll')}}">See More</a></div>
                    </div>
                </div>
            </div>
            <div class="avds_large">
                <div class="avds_background" style="background-image:url(images/avds_large.jpg)"></div>
                <div class="avds_large_container">
                    <div class="avds_large_content">
                        <div class="avds_title">FoodBox's</div>
                        <div class="avds_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a
                            ultricies metus. Sed nec molestie eros. Sed viver ra velit venenatis fermentum luctus.
                        </div>
                        <div class="avds_link avds_link_large"><a href="{{route('showCatAll')}}">See More</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Products -->

    <div class="products">
        <div class="container">
            <div class="row">
                <div class="col">



 <div class="product_grid">
@foreach($categories as $category)
    <!-- Product -->
        <div class="product">
            <div class="product_image"><img src="images/product_8.jpg" alt="{{$category->title}}"></div>
            <div class="product_extra product_sale"><a href="{{route('showCategory',$category->alias)}}">{{$category->title}}</a></div>
            <div class="product_content">
                <div class="product_title"><a href="{{route('showCategory',$category->alias)}}">{{$category->title}}</a></div>
            </div>
        </div>
    @endforeach
 </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Ad -->

    <div class="avds_xl">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="avds_xl_container clearfix">
                        <div class="avds_xl_background" style="background-image:url(images/avds_xl.jpg)"></div>
                        <div class="avds_xl_content">
                            <div class="avds_title">Amazing Devices</div>
                            <div class="avds_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a
                                ultricies metus.
                            </div>
                            <div class="avds_link avds_xl_link"><a href="categories.html">See More</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Icon Boxes -->

    <div class="icon_boxes">
        <div class="container">
            <div class="row icon_box_row">

                <!-- Icon Box -->
                <div class="col-lg-6 icon_box_col">
                    <div class="icon_box">
                        <div class="icon_box_image"><img src="images/icon_1.svg" alt=""></div>
                        <div class="icon_box_title">Free Shipping</div>
                        <div class="icon_box_text">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed
                                nec molestie.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 icon_box_col">
                    <div class="icon_box">
                        <div class="icon_box_image"><img src="images/icon_3.svg" alt=""></div>
                        <div class="icon_box_title">24h Fast Support</div>
                        <div class="icon_box_text">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed
                                nec molestie.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


@endsection
@section('custom_js')
        <script src="{{asset('js/categories.js')}}"></script>
@endsection
