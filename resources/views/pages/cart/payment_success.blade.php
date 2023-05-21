<!DOCTYPE html>
<html lang="en">

<head>
    <title>Thanh toán thành công</title>
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
    <link rel="stylesheet" href="{{ asset('frontend/css/purchase.css') }}">
    <script src="{{ asset('frontend/js/purchase.js') }}" defer></script>
</head>

<body>
    <div class="cursor-round"></div>
    <div class="main"></div>
    <div data-speed="-1" class="slider">

        <div class="mainn">
            <div class="lefty">
                <b class="title">Figurin</b>

                <div class="directory">
                    <a href="{{ URL::to('/trang-chu') }}">Trang chủ</a>
                    <a href="{{ URL::to('/show-cart') }}">Giỏ hàng</a>
                </div>

                <b>Thông tin giao hàng</b>

                <div class="item">
                    <i class="fa-regular fa-circle-check"></i>
                    <div class="item__text">
                        <b>Đơn hàng thanh toán thành công</b>
                        <span>Cảm ơn bạn đã thanh toán mua hàng</span>
                    </div>
                </div>

                <div class="receipt">
                    <b>Thông tin đơn hàng</b> <br>

                    <span>Họ và tên: 
                        <?php
                            $name = Session::get('user_name');
                            echo $name;
                        ?>
                    </span><br>
                    <span>Số điện thoại: 
                    <?php
                        $phone = Session::get('user_phone');
                        echo $phone;
                    ?>    
                    </span><br>
                    <span>Địa chỉ: 
                    <?php
                        $address = Session::get('user_address');
                        echo $address;
                    ?> 
                    </span><br>

                    <br>

                    <b>Phương thức thanh toán</b><br>
                    @foreach ($content_method as $key=>$pro)
                    <span><i class="fa-solid fa-truck-fast"></i>
                        {{$pro->payment_method}}
                    </span>
                    @endforeach
                </div>
                <form action="{{URL::to('/keep-bying')}}" method="POST">
                    @csrf
                    <button name="" type="submit" class="purchase" style="display: block; margin-top: 20px;">Xác nhận đơn hàng</button>
                </form>
            </div>
            <?php
                $content = Cart::content();
            ?>
            <div class="righty" >
                @foreach ($content as $v_content)
                    <div class="product">
                        <div class="product__detail">
                            <img src="{{ asset('uploads/product/' . $v_content->options->image) }}" alt="">
                            <span class="product__text">{{ $v_content->name }}</span>
                            <span class="product-quanity">x{{ $v_content->qty }}</span>
                        </div>
                        <div class="product__price">
                            <?php
                            $subtotal = $v_content->price * $v_content->qty;
                            echo number_format($subtotal) . '₫';
                            ?>
                        </div>
                    </div>
                @endforeach
                <div class="total">
                    <span>Tổng cộng</span>
                    <span class="total__price">
                        {{ Cart::subtotal() . '₫' }}
                    </span>
                </div>
            </div>
        </div>
</body>

</html>
