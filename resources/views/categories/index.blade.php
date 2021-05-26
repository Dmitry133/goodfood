@extends('layouts.main')

@section('custom_css')
    <link rel="stylesheet" type="text/css" href="{{asset('styles/categories.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('styles/categories_responsive.css')}}">
@endsection

@section('content')
    <div class="home">
        <div class="home_container">
            <div class="home_background" style="background-image:url({{asset($cat->imagepath)}}"></div>
            <div class="home_content_container">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="home_content">
                                <div class="home_title">{{$cat->title}}<span>.</span></div>
                                <div class="home_text"><p>{{$cat->description}}</p></div>
                            </div>
                        </div>
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

                    <!-- Product Sorting -->
                    <div class="sorting_bar d-flex flex-md-row flex-column align-items-md-center justify-content-md-start">
                        <div class="results">Showing <span>{{$cat->products->count()}}</span> results</div>
                        <div class="sorting_container ml-md-auto">
                            <div class="sorting">
                                <ul class="item_sorting">
                                    <li>
                                        <span class="sorting_text">Sort by</span>
                                        <i class="fa fa-chevron-down" aria-hidden="true"></i>
                                        <ul>
                                            <li class="product_sorting_btn" data-order="default"><span>Default</span></li>
                                            <li class="product_sorting_btn" data-order="price-low-high"><span>Price: Low-High</span></li>
                                            <li class="product_sorting_btn" data-order="price-high-low"><span>Price: High-Low</span></li>
                                            <li class="product_sorting_btn" data-order="name-a-z"><span>Name: A-Z</span></li>
                                            <li class="product_sorting_btn" data-order="name-z-a"><span>Name: Z-A</span></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                    {{$products->appends(request()->query())->links('pagination.index')}}

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
                        <div class="icon_box_image"><img src="{{asset('images/icon_1.svg')}}" alt=""></div>
                        <div class="icon_box_title">Free Shipping</div>
                        <div class="icon_box_text">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie.</p>
                        </div>
                    </div>
                </div>

                <!-- Icon Box -->
                <div class="col-lg-6 icon_box_col">
                    <div class="icon_box">
                        <div class="icon_box_image"><img src="{{asset('images/icon_3.svg')}}" alt=""></div>
                        <div class="icon_box_title">24h Fast Support</div>
                        <div class="icon_box_text">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
@section('custom_js')
{{--    <script src="{{asset('js/categories.js')}}"></script>--}}

    <script>
        $(document).ready(function () {
            $('.product_sorting_btn').click(function () {
                let orderBy = $(this).data('order')
                $('.sorting_text').text($(this).find('span').text())
                $.ajax({
                    url: "{{route('showCategory',$cat->alias)}}",
                    type: "GET",
                    data: {
                        orderBy: orderBy,
                        page: {{isset($_GET['page']) ? $_GET['page'] : 1 }}
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: (data) => {
                        let positionParameters = location.pathname.indexOf('?');
                        let url = location.pathname.substring(positionParameters,location.pathname.length);
                        let newURL = url + '?';
                        newURL += 'orderBy=' + orderBy + "&page={{isset($_GET['page']) ? $_GET['page'] : 1}}";
                        history.pushState({}, '', newURL);

                        $('.product_grid').html(data)
                        $('.product_grid').isotope('destroy')
                        $('.product_grid').imagesLoaded( function() {
                            let grid = $('.product_grid').isotope({
                                itemSelector: '.product',
                                layoutMode: 'fitRows',
                                fitRows:
                                    {
                                        gutter: 30
                                    }
                            });
                        });
                    }
                });
            })
        })
    </script>
@endsection
