<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('frontend/img/our damn logo.png') }}" sizes="32x32" />
    <link rel="stylesheet" href="{{ asset('frontend/css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/font/Quicksand/quicksand.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/fontawesome-free-6.2.0-web/css/all.css') }}">
    <script src="{{ asset('frontend/js/cursor.js') }}" defer></script>
    <script src="{{ asset('frontend/js/responsive.js') }}" defer></script>
    <link rel="stylesheet" href="php/config.php">
</head>

<body>
    <div class="cursor-round"></div>
    <div class="main"></div>
    <div data-speed="-1" class="slider">
        <div class="navbar">
            <div class="navbar__top">
                <img class="li-text" src="//theme.hstatic.net/1000160337/1000885200/14/logo.png?v=288" alt="">
                <form style="display: contents" action="{{ URL::to('/tim-kiem') }}" method="POST">
                    @csrf
                    <div class="navbar__search li-text">
                        <input name="keywords_submit" type="text">
                        <button><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                </form>
                <div class="navbar__top__item">
                    <button class="button is-text" id="menu-button">
                        <div class="button-inner-wrapper">
                            <span class="icon menu-icon"></span>
                        </div>
                    </button>
                    <div class="navbar__mobile">
                        <ul>
                            <li><a class="li-text" href="{{ URL::to('/trang-chu') }}">Trang chủ</a></li>
                            {{-- <li><a class="li-text" href="">Thông tin</a></li> --}}
                            <li class="nav__product__mobile">
                                <a class="li-text">Sản phẩm</a>
                                <div class="product__drop__mobile">
                                    <a href="{{ URL::to('/san-pham') }}">Tất cả sản phẩm</a>
                                    @foreach ($category as $key => $cate)
                                        <a href="{{ $cate->category_id }}">{{ $cate->category_name }}</a>
                                    @endforeach
                                </div>
                            </li>
                            <li><a class="li-text" href="{{URL::to('https://t.me/joinchat/Gn7UwkXl5DwWH4brm8NQTA')}}">Kết nối</a></li>
                            <li><a class="li-text" href="{{URL::to('/lien-lac')}}">Liên lạc</a></li>
                        </ul>
                    </div>
                    <div class="navbar__top__item__right">
                        <a href="<?php
                        $name = Session::get('user_name');
                        if ($name) {
                            echo '/thong-tin';
                        } else {
                            echo '/login';
                        }
                        ?>" class="navbar__top__acc li-text">
                            <i class="fa-regular fa-user"></i>
                            <span class="navbar__item-span">
                                <?php
                                if ($name) {
                                    echo $name;
                                } else {
                                    echo 'Đăng nhập / Đăng ký';
                                }
                                ?>
                            </span>
                        </a>
                        <div class="navbar__top__cart li-text">
                            <a class="" href="{{ URL::to('/show-cart') }}">
                                <i class="fa-solid fa-cart-shopping">
                                    {{-- @foreach ($content as $v_content) --}}
                                    <div class="count_holder">
                                        <f>
                                            <?php
                                            echo Cart::count();
                                            ?>
                                        </f>
                                    </div>
                                    {{-- @endforeach --}}
                                </i>
                                <span class="navbar__item-span">Giỏ Hàng</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- nav-mobile --}}
            <div class="navbar__bot">
                <ul>
                    <li><a class="li-text" href="{{ URL::to('/trang-chu') }}">Trang chủ</a></li>
                    {{-- <li><a class="li-text" href="">Thông tin</a></li> --}}
                    <li class="nav__product">
                        <a class="bot__item li-text">Sản phẩm</a>
                        <i class="fa-solid fa-chevron-down arrow--down"></i>
                        <div class="product__drop">
                            <a href="{{ URL::to('/san-pham') }}">Tất cả sản phẩm</a>
                            @foreach ($category as $key => $cate)
                                <a
                                    href="{{ URL::to('/danh-muc-san-pham/' . $cate->category_id) }}">{{ $cate->category_name }}</a>
                            @endforeach
                        </div>
                    </li>
                    <li><a class="li-text" href="{{URL::to('https://t.me/joinchat/Gn7UwkXl5DwWH4brm8NQTA')}}" target="_blank">Kết nối</a></li>
                    <li><a class="li-text" href="{{URL::to('/lien-lac')}}">Liên lạc</a></li>

                </ul>
            </div>
            {{-- nav-pc --}}
        </div>

        @yield('content')
        {{-- @yield('product_content') --}}

        <div class="footer">
            <div class="footer__top">
                <span>Follow Figurin on Instagram</span>
                {{-- @figurin.vnn --}}
            </div>
            <div class="footer__mid">
                <div class="footer__mid__img hover--style1">
                    <img src="{{ asset('frontend/img/footer/gallery_item_1_img.webp') }}">
                </div>
                <div class="footer__mid__img hover--style1">
                    <img src="{{ asset('frontend/img/footer/gallery_item_2_img.webp') }}">
                </div>
                <div class="footer__mid__img hover--style1">
                    <img src="{{ asset('frontend/img/footer/gallery_item_3_img.webp') }}">
                </div>
                <div class="footer__mid__img hover--style1">
                    <img src="{{ asset('frontend/img/footer/gallery_item_4_img.jpg') }}">
                </div>
                <div class="footer__mid__img hover--style1">
                    <img src="{{ asset('frontend/img/footer/gallery_item_5_img.jpg') }}">
                </div>
                <div class="footer__mid__img hover--style1">
                    <img src="{{ asset('frontend/img/footer/gallery_item_6_img.jpg') }}">
                </div>
            </div>
            <div class="footer__bot">
                <div class="footer__bot-item">
                    <b>Giới thiệu Figurin</b>
                    <span>Giúp các bạn trẻ Việt Nam dễ dàng tiếp cận với mô
                        hình figure Nhật Bản</span>
                </div>
                <div class="footer__bot-item">
                    <b>Địa chỉ của chúng tôi</b>
                    <span>Địa chỉ: Quận 10, Tp. Hồ Chí Minh. <br>
                        Figrin chưa có không gian trưng bày, bạn vui lòng
                        hẹn trước khi đến<br>
                </div>
                <div class="footer__bot-item">
                    <b>Chăm sóc khách hàng</b>
                    <span><i class="fa-solid fa-phone"></i>0908268007</span>
                    <span><i class="fa-solid fa-envelope"></i>figurinemailing@gmail.com</span>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
