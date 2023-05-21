@extends('layout')
@section('content')
    <title>Thương hiệu sản phẩm</title>
    <link rel="icon" type="image/png" href="{{asset('frontend/img/our damn logo.png')}}" sizes="32x32" />
    <link rel="stylesheet" href="{{asset('frontend/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/navbar.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/font/Quicksand/quicksand.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/fontawesome-free-6.2.0-web/css/all.css')}}">
    <script src="{{asset('frontend/js/parallax.js')}}" defer></script>
    <script src="{{asset('frontend/js/cursor.js')}}" defer></script>
    <script src="{{asset('frontend/js/responsive.js')}}" defer></script>
<div class="banner">
    <img src="{{asset('frontend/img/collection_banner.webp')}}" alt="">
</div>

<div class="content">
    <div class="collection">
        @foreach ($brand_name as $key => $brand_pro)
            <span>{{$brand_pro->brand_name}}</span>
        @endforeach
        <div class="collection__categ collection__categ--mobile li-text">
            <i class="fa-solid fa-angle-down"></i>
            Sắp xếp
            <div class="categ__box">
                <ul>
                    <li class="categ--check">
                        <i class="fa-solid fa-check"></i>
                        Tất cả sản phẩm</li>
                    <li>
                            <i class="fa-solid fa-check"></i>
                            Giá: Tăng dần</li>
                    <li>
                            <i class="fa-solid fa-check"></i>
                            Giá: Tăng giảm</li>
                    <li>
                            <i class="fa-solid fa-check"></i>
                            Tên: A-Z</li>
                    <li>
                            <i class="fa-solid fa-check"></i>
                            Tên: Z-A</li>
                    <li>
                            <i class="fa-solid fa-check"></i>
                            Cũ nhất</li>
                    <li>
                            <i class="fa-solid fa-check"></i>
                            Mới nhất</li>
                    <li>
                            <i class="fa-solid fa-check"></i>
                            Bán chạy nhất</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="filter">
        <i class="fa-solid fa-filter"></i>
        Phân loại

        <div class="filter__seperate"></div>

        <div class="filter__option li-text">
            Thương hiệu
            <i class="fa-solid fa-arrow-down"></i>
            <div class="filler__box">
                <ul>
                    <li>
                        <label>
                            <a class="dropdown_select" href="{{URL::to('/san-pham')}}">
                                <span >Mọi hãng</span>
                            </a>
                        </label>
                    </li>
                </ul>
                @foreach ($brand as $key => $brand_pro)
                <ul>
                    <li>
                        <label>
                            <a class="dropdown_select" href="{{URL::to('/thuong-hieu/'.$brand_pro->brand_id)}}">
                                <span>{{$brand_pro->brand_name}}</span>
                                
                                    
                            </a>
                        </label>
                    </li>
                </ul>
                @endforeach
            </div>
        </div>

        <div class="filter__option li-text">
            Lọc giá
            <i class="fa-solid fa-arrow-down"></i>
            <div class="filler__box">
                <ul>
                    <li>
                        <label>
                            <input type="radio" name="price" checked> Mọi giá
                        </label>
                    </li>
                    <li>
                        <label>
                            <input type="radio" name="price"> Dưới 1.000.000₫
                        </label>
                    </li>
                    <li>
                        <label>
                            <input type="radio" name="price"> 1.000.000₫ - 2.000.000₫
                        </label>
                    </li>
                    <li>
                        <label>
                            <input type="radio" name="price"> 2.000.000₫ - 3.000.000₫
                        </label>
                    </li>
                    <li>
                        <label>
                            <input type="radio" name="price"> 3.000.000₫ - 4.000.000₫
                        </label>
                    </li>
                    <li>
                        <label>
                            <input type="radio" name="price"> Trên 4.000.000₫
                        </label>
                    </li>
                </ul>
            </div>
        </div>

        <div class="filter__option li-text">
            Tỉ lệ
            <i class="fa-solid fa-arrow-down"></i>
            <div class="filler__box">
                <ul>
                    <li>
                        <label>
                            <input type="radio" name="scale" checked> Mọi tỉ lệ
                        </label>
                    </li>
                    <li>
                        <label>
                            <input type="radio" name="scale"> 1/12
                        </label>
                    </li>
                    <li>
                        <label>
                            <input type="radio" name="scale"> 1/10
                        </label>
                    </li>
                    <li>
                        <label>
                            <input type="radio" name="scale"> 1/7
                        </label>
                    </li>
                    <li>
                        <label>
                            <input type="radio" name="scale"> 1/6
                        </label>
                    </li>
                    <li>
                        <label>
                            <input type="radio" name="scale"> 1/5
                        </label>
                    </li>
                    <li>
                        <label>
                            <input type="radio" name="scale"> 1/4
                        </label>
                    </li>
                    <li>
                        <label>
                            <input type="radio" name="scale"> 1/3
                        </label>
                    </li>
                    <li>
                        <label>
                            <input type="radio" name="scale"> Non-scale
                        </label>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="filter__mobile">
        <div class="mobile__op mobile-filter">
            <i class="fa-solid fa-filter mobile-filter__click"></i>
            Phân loại
            <div class="filter__box">
                <ul>
                    <li>
                        <span class="filter__brand">Thương hiệu</span>
                        <div class="filter__box__detail filter__brand--detail">
                            <ul>
                                <li>
                                    <label>
                                        <a class="dropdown_select" href="{{URL::to('/thuong-hieu')}}">
                                            <input type="radio" name="brandm" checked>Mọi hãng
                                        </a>
                                    </label>
                                </li>
                            </ul>
                            @foreach ($brand as $key => $brand_pro)
                            <ul>
                                <li>
                                    <label>
                                        <a class="dropdown_select" href="{{URL::to('/thuong-hieu/'.$brand_pro->brand_id)}}">
                                            <span>{{$brand_pro->brand_name}}</span>
                                        </a>
                                    </label>
                                </li>
                            </ul>
                            @endforeach
                        </div>
                    </li>
                    <li>
                        <span class="filter__price">Lọc giá</span>
                        <div class="filter__box__detail filter__price--detail">
                            <ul>
                                <li>
                                    <label>
                                        <input type="radio" name="pricem" checked> Mọi giá
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="pricem"> Dưới 1.000.000₫
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="pricem"> 1.000.000₫ - 2.000.000₫
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="pricem"> 2.000.000₫ - 3.000.000₫
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="pricem"> 3.000.000₫ - 4.000.000₫
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="pricem"> Trên 4.000.000₫
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <span class="filter__scale">Tỉ lệ</span>
                        <div class="filter__box__detail filter__slace--detail">
                            <ul>
                                <li>
                                    <label>
                                        <input type="radio" name="scalem" checked> Mọi tỉ lệ
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="scalem"> 1/12
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="scalem"> 1/10
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="scalem"> 1/7
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="scalem"> 1/6
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="scalem"> 1/5
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="scalem"> 1/4
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="scalem"> 1/3
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="scalem"> Non-scale
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="mobile__op mobile-collect">
            <i class="fa-solid fa-angle-down mobile-collect__click"></i>
            Sắp xếp
            <div class="categ__box">
                <ul>
                    <li class="categ--check">
                        Tất cả sản phẩm
                        <i class="fa-solid fa-check"></i></li>
                    <li>Hàng có sẵn
                        <i class="fa-solid fa-check"></i>
                    </li>
                    <li>Hàng order
                        <i class="fa-solid fa-check"></i>
                        </li>
                    <li>R18
                        <i class="fa-solid fa-check"></i>
                        </li>
                    <li>Scale Figure
                        <i class="fa-solid fa-check"></i>
                        </li>
                    <li>Art book
                        <i class="fa-solid fa-check"></i>
                        </li>
                </ul>
            </div>
        </div>
        
    </div>

    <div class="product">    
        @foreach ($brand_by_id as $key =>$product)
        <div class="product__item">
            <a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}">
                <img src="{{URL::to('uploads/product/'.$product->product_image)}}" alt="" title="{{$product->product_name}}">
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
                    <button class="price__button__buy price__button--hover">
                        <i class="fa-solid fa-bag-shopping"></i>
                        <span>Mua ngay</span>
                    </button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection