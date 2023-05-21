@extends('layout')
@section('content')
    <title>Tìm kiếm</title>
    <link rel="icon" type="image/png" href="{{asset('frontend/img/our damn logo.png')}}" sizes="32x32" />
    <link rel="stylesheet" href="{{asset('frontend/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/navbar.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/font/Quicksand/quicksand.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/fontawesome-free-6.2.0-web/css/all.css')}}">
    <script src="{{asset('frontend/js/parallax.js')}}" defer></script>
    <script src="{{asset('frontend/js/cursor.js')}}" defer></script>
    <script src="{{asset('frontend/js/responsive.js')}}" defer></script>
    <script src="{{asset('frontend/js/category.js')}}" defer></script>
<div class="banner">
    <img src="{{asset('frontend/img/collection_banner.webp')}}" alt="">
</div>

<div class="content">
    <div class="collection">
        <span>Tìm kiếm</span>
    </div>
    <div class="filter">
        Kết quả tìm kiếm
    </div>
    <div class="product">    
        @foreach ($search_product as $key =>$product)
        <div class="product__item">
            <a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}">
                <img src="{{URL::to('uploads/product/'.$product->product_image)}}" title="{{$product->product_name}}" alt="">
            </a>
            <div class="product__item__price">
                <f title="{{$product->product_name}}">{{$product->product_name}}</f>
                <span>{{number_format($product->product_price,0,',',',').'₫'}}</span>
                <div class="price__button">
                    <form action="{{URL::to('/save-cart')}}" method="POST">
                        @csrf
                        <input name="productID_hidden" type="hidden"  value="{{$product->product_id}}" />
                        <input class="ammount-input" name="qty" type="hidden" value="1">
                        <button class="price__button__add price__button--hover">
                            <i class="fa-solid fa-cart-shopping"></i>
                            <span>Thêm vào giỏ</span>
                        </button>
                    </form>
                    <form action="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}">
                        <button class="price__button__buy price__button--hover">
                            <i class="fa-solid fa-bag-shopping"></i>
                            <span>Mua ngay</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    
        @endforeach
    </div>
</div>
@endsection