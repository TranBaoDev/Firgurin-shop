@extends('layout')
@section('product_content')
{{-- <link rel="stylesheet" href="{{asset('frontend/css/main.css')}}"> --}}
<div>    
    @foreach ($brand_by_id as $key =>$product)
    <div class="product__item">
        <a href="">
            <img src="{{URL::to('uploads/product/'.$product->product_image)}}" alt="" title="{{$product->product_name}}">
        </a>
        <div class="product__item__price">
            <f title="{{$product->product_name}}">{{$product->product_name}}</f>
            <span>{{$product->product_price}}₫</span>
            <div class="price__button">
                <button class="price__button__add price__button--hover">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <span>Thêm vào giỏ</span>
                </button>
                <button class="price__button__buy price__button--hover">
                    <i class="fa-solid fa-bag-shopping"></i>
                    <span>Mua ngay</span>
                </button>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection