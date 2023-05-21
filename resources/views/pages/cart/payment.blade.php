<!DOCTYPE html>
<html lang="en">

<head>
    <title>Thanh toán</title>
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
    {{-- <div class="main"></div> --}}
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
                    <i class="fa-solid fa-user"></i>
                    <div class="item__text">
                        {{-- @foreach ($user_infor as $user_pro)
                        <b>{{$user_pro->user_name}} (<span>email</span>)</b>
                        @endforeach --}}
                        <b>
                            <?php
                                $name = Session::get('user_name');
                                echo $name;
                            ?>
                            (<span>
                                <?php
                                $gmail = Session::get('user_gmail');
                                    if ($gmail) {
                                        echo $gmail;
                                    }
                                ?>
                            </span>)
                        </b>
                        <a class="li-text" href="/log_out_user">Đăng xuất</a>
                    </div>
                </div>
                <form action="{{ URL::to('/save-payment-customer') }}" method="POST">
                    @csrf
                    {{-- @foreach ($shipping_info_user as $key => $user_pro)
                        <input type="text" name="shipping_name" placeholder="Họ và tên" value="{{$user_pro->user_name}}">
                        <input type="text" name="shipping_address" placeholder="Địa chỉ" value="{{$user_pro->user_address}}">
                        <input type="text" name="shipping_phone" placeholder="Số điện thoại" value="{{$user_pro->user_phone}}">
                    @endforeach --}}
                    <input type="text" name="shipping_name" placeholder="Họ và tên" value="<?php
                    $name = Session::get('user_name');
                    echo $name;
                    ?>">
                    <input type="text" name="shipping_address" placeholder="Địa chỉ" value="<?php
                    $address = Session::get('user_address');
                        if ($address) {
                            echo $address;
                        }
                    ?>">
                    <input type="text" name="shipping_phone" placeholder="Số điện thoại" value="<?php
                    $phone = Session::get('user_phone');
                        if ($phone) {
                            echo $phone;
                        }
                    ?>">

                    <div class="payment__title">Phương thức thanh toán</div>
                    <div class="payment__method">
                        <div class="payment__option option1 li-text">
                            <i class="fa-solid fa-credit-card"></i> Chuyển
                            khoản đến Figurin
                        </div>

                        <div class="payment__option option1--open option-detail">
                            Chủ TK: Trần Phạm Quốc Bảo<br>
                            Nội dung chuyển khoản: Mã Đơn Hàng của bạn.<br>
                            Vd: Cọc 50 phan tram 012345, Thanh toán 100 phan
                            tram 012345 <br>

                            1. Techcombank Số TK: 19032672750016 Chi nhánh: Kỳ
                            Hòa<br>

                            2. VIB Số TK: 005181007 Chi nhánh VIB Gia Định<br>
                            3. Vietcombank Số TK: 0421000442816 Chi nhánh Phú
                            Thọ<br>

                            4. ACB Số TK: 143091319 Chi nhánh: Phòng giao dịch
                            Vạn Hạnh<br>

                            5. VPbank Số TK: 655580999 Chi nhánh Phòng giao dịch
                            Quận 10<br>
                        </div>

                        <div class="payment__option option2 li-text">
                            <i class="fa-solid fa-wallet"></i> Chuyển
                            tiền đến ví điện tử
                        </div>

                        <div class="payment__option option2--open option-detail">
                            Momo / Zalo Pay / Viettel Money <br>
                            SĐT: 0908268007<br>
                            Người nhận: Trần Phạm Quốc Bảo<br>
                            Nội dung chuyển khoản: Mã Đơn Hàng của bạn.<br>
                            Vd: Cọc 50 phan tram 012345, Thanh toán 100 phan
                            tram 012345<br>
                        </div>

                        <div class="payment__option option3 li-text">
                            <i class="fa-solid fa-truck-fast"></i> COD - Chỉ áp dụng với sản phẩm có sẵn
                        </div>

                        <div class="payment__option option3--open option-detail">
                            Đặc biệt lưu ý: Hãy chắc chắn bạn đã liên hệ với admin để xác định sản phẩm này có sẵn hay
                            cần
                            đặt trước. Thời gian ship từ 1-4 ngày tuỳ vào địa chỉ của bạn, bạn có thể thanh toán 100%
                            cho
                            shipper. Shipper sẽ gọi điện cho bạn trước khi đến. Đơn hàng sẽ tự động huỷ nếu bạn lựa chọn
                            COD
                            cho sản phẩm cần đặt trước.
                        </div>

                        <div class="payment__btn">
                            <button name="payment_option" value="Thanh toán bằng chuyển khoản"
                                class="purchase li-text btn1">Thanh toán bằng chuyển khoản</button>
                            <button name="payment_option" value="Thanh toán bằng ví điện tử"
                                class="purchase li-text btn2">Thanh toán bằng ví điện tử</button>
                            <button name="payment_option" value="Thanh toán COD" class="purchase li-text btn3">Thanh
                                toán COD</button>
                        </div>
                </form>
            </div>

        </div>
        <?php
        $content = Cart::content();
        ?>
        <div class="righty">
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
