@extends('layouts.main')

@section('content')
    <div class="home">
        <div class="home_slider_container">

            <!-- Home Slider -->
            <div class="owl-carousel owl-theme home_slider">

                <!-- Slider Item -->
                <div class="owl-item home_slider_item">
                    <div class="home_slider_background" style="background-image:url(images/home_slider_1.jpg)"></div>
                    <div class="home_slider_content_container">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="home_slider_content" data-animation-in="fadeIn"
                                         data-animation-out="animate-out fadeOut">
                                        <div class="home_slider_title">Healthy food delivery.</div>
                                        <div class="home_slider_subtitle">Lorem ipsum dolor sit amet, consectetur
                                            adipiscing elit. Nullam a ultricies metus. Sed nec molestie eros. Sed
                                            viverra velit venenatis fermentum luctus.
                                        </div>
                                        <div class="button button_light home_button"><a href="{{route('showCatAll')}}">Shop Now</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slider Item -->
                <div class="owl-item home_slider_item">
                    <div class="home_slider_background" style="background-image:url(images/home_slider_1.jpg)"></div>
                    <div class="home_slider_content_container">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="home_slider_content" data-animation-in="fadeIn"
                                         data-animation-out="animate-out fadeOut">
                                        <div class="home_slider_title">Healthy food delivery.</div>
                                        <div class="home_slider_subtitle">Lorem ipsum dolor sit amet, consectetur
                                            adipiscing elit. Nullam a ultricies metus. Sed nec molestie eros. Sed
                                            viverra velit venenatis fermentum luctus.
                                        </div>
                                        <div class="button button_light home_button"><a href="{{route('showCatAll')}}">Shop Now</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slider Item -->
                <div class="owl-item home_slider_item">
                    <div class="home_slider_background" style="background-image:url(images/home_slider_1.jpg)"></div>
                    <div class="home_slider_content_container">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="home_slider_content" data-animation-in="fadeIn"
                                         data-animation-out="animate-out fadeOut">
                                        <div class="home_slider_title">Healthy food delivery.</div>
                                        <div class="home_slider_subtitle">Lorem ipsum dolor sit amet, consectetur
                                            adipiscing elit. Nullam a ultricies metus. Sed nec molestie eros. Sed
                                            viverra velit venenatis fermentum luctus.
                                        </div>
                                        <div class="button button_light home_button"><a href="{{route('showCatAll')}}">Shop Now</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Home Slider Dots -->

            <div class="home_slider_dots_container">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="home_slider_dots">
                                <ul id="home_slider_custom_dots" class="home_slider_custom_dots">
                                    <li class="home_slider_custom_dot active">01.</li>
                                    <li class="home_slider_custom_dot">02.</li>
                                    <li class="home_slider_custom_dot">03.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Ads -->

    <div class="avds">
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

                    @foreach($products as $product)
                        <!-- Product -->
                            <div class="product">
                                <div class="product_image"><img src="{{asset($product->imagepath)}}" alt="{{$product->name}}"></div>
                                <div class="product_extra product_sale"><a href="{{route('showCategory',$product->category['alias'])}}">{{$product->category['title']}}</a></div>
                                <div class="product_content">
                                    <div class="product_title"><a href="{{route('showProduct',['category',$product->id])}}">{{$product->name}}</a></div>
                                    @if($product->new_price != null)
                                        <div style="text-decoration: line-through">{{$product->price}} RUB</div>
                                        <div class="product_price">{{$product->new_price}} RUB</div>
                                    @else
                                        <div class="product_price">{{$product->price}} RUB</div>
                                    @endif
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
                            <div class="avds_title">Great taste</div>
                            <div class="avds_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a
                                ultricies metus.
                            </div>
                            <div class="avds_link avds_xl_link"><a href="{{route('showCatAll')}}">See More</a></div>
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

                <!-- Icon Box -->
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

    <!-- Newsletter -->


@endsection
