@foreach($products as $product)
    <!-- Product -->
    <div class="product">
        <div class="product_image"><img src="{{asset('images/product_8.jpg')}}" alt="{{$product->name}}"></div>
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
