@extends('layout')
@section('content')
    <title>Figurin</title>
    <link rel="icon" type="image/png" href="{{asset('frontend/img/our damn logo.png')}}" sizes="32x32" />
    <link rel="stylesheet" href="{{asset('frontend/css/home.css')}}">
    <script src="{{asset('frontend/js/home.js')}}" defer></script>
    <div class="banner">
        <div class="banner-navigate">
            <div class="banner--button button__left li-text">
                <i class="fa-solid fa-chevron-left"></i>
            </div>
            <div class="banner--button button__right li-text">
                <i class="fa-solid fa-chevron-right"></i>
            </div>
        </div>
        <img class="banner-slide" src="{{asset('frontend/img/home/slide_1_img.webp')}}" style="display: block;" alt="">
        <img class="banner-slide" src="{{asset('frontend/img/home/slide_2_img.webp')}}" alt="">
        <img class="banner-slide" src="{{asset('frontend/img/home/slide_3_img.webp')}}" alt="">
        <img class="banner-slide" src="{{asset('frontend/img/home/slide_4_img.webp')}}" alt="">
        <img class="banner__img" src="{{asset('frontend/img/home/slide_1_img.webp')}}" alt="">
    </div>

    <div class="colection">
        <div class="collection__content li-text">
            <div class="collection__content__left">
                <span>Bộ sưu tập</span>
                <b>Nedoroid</b>
                <span>
                    Dòng chibi figure được yêu thích nhất,
                    nhiều gương mặt, thoả sức tạo dáng</span>
                    <button>
                        <span>Xem ngay</span>
                    </button>
            </div>
            <img src="{{asset('frontend/img/home/categorybanner_1_img.webp')}}" alt="">
        </div>
        <div class="collection__content li-text">
            <div class="collection__content__left">
                <span>Bộ sưu tập</span>
                <b>Nedoroid</b>
                <span>
                    Dòng chibi figure được yêu thích nhất,
                    nhiều gương mặt, thoả sức tạo dáng</span>
                <button>
                    <span>Xem ngay</span>
                </button>
            </div>
            <img src="{{asset('frontend/img/home/categorybanner_2_img.webp')}}" alt="">
        </div>
    </div>

    <div class="content">

        <div class="catalog">
            <b>Sản phẩm order</b>
            <span>Những sản phẩm đã hoặc sắp phát hành & cần đặt trước</span>
            <div class="cata__box order">
                <img src="{{asset('frontend/img/home/home_collection_1_banner.webp')}}" alt="">
                <div class="cata__contain">
                    <div class="cata__navigate">
                        <div class="cata--button cata--left">
                            <i class="fa-solid fa-chevron-left"></i>
                        </div>
                        <div class="cata--button cata--left">
                            <i class="fa-solid fa-chevron-right"></i>
                        </div>
                    </div>
                    <div class="product">    
                        @foreach ($pre_order_product as $key =>$product)
                        <div class="product__item">
                            <a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}">
                                <img src="{{URL::to('uploads/product/'.$product->product_image)}}" title="{{$product->product_name}}" alt="">
                            </a>
                            <div class="product__item__price">
                                <f title="{{$product->product_name}}">{{$product->product_name}}</f>
                                <span>{{number_format($product->product_price,0,',',',').' '.'₫'}}</span>
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
            </div>
        </div>

        <!-- Có sẵn -->

        <div class="catalog">
            <b>Sản phẩm có sẵn</b>
            <span>Sản phẩm đang có sẵn, bạn có thể mua ngay</span>
            <div class="cata__box">
                <img src="{{asset('frontend/img/home/home_collection_1_banner.webp')}}" alt="">
                <div class="cata__contain">
                    <div class="cata__navigate">
                        <div class="cata--button cata--left">
                            <i class="fa-solid fa-chevron-left"></i>
                        </div>
                        <div class="cata--button cata--left">
                            <i class="fa-solid fa-chevron-right"></i>
                        </div>
                    </div>
                    <div class="product">    
                        @foreach ($avail_order_product as $key =>$product)
                        <div class="product__item">
                            <a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}">
                                <img src="{{URL::to('uploads/product/'.$product->product_image)}}" title="{{$product->product_name}}" alt="">
                            </a>
                            <div class="product__item__price">
                                <f title="{{$product->product_name}}">{{$product->product_name}}</f>
                                <span>{{number_format($product->product_price,0,',',',').' '.'₫'}}</span>
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
            </div>
        </div>


    </div>

    <div class="detail">
        <div class="detail__item">
            <i class="fa-solid fa-box"></i>
            <b>Sản phẩm chính hãng</b>
            <span>Nhập khâu trực tiếp từ Nhật Bản</span>
        </div>

        <div class="detail__item">
            <i class="fa-regular fa-credit-card"></i>
            <b>Thanh toán đơn giản</b>
            <span>Chuyển khoản hoặc COD</span>
        </div>

        <div class="detail__item">
            <i class="fa-solid fa-truck"></i>
            <b>Giao hàng nhanh chóng</b>
            <span>Miễn phí với đơn hàng >1000K</span>
        </div>
    </div>
@endsection