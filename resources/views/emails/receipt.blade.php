    <link rel="stylesheet" href="{{ asset('frontend/font/Quicksand/quicksand.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/fontawesome-free-6.2.0-web/css/all.css') }}">
    <link rel="stylesheet" href="php/config.php">
    <link rel="stylesheet" href="{{ asset('frontend/css/purchase.css') }}">

<div class="mainn">
    <div class="lefty">
        <div class="receipt">
            <b>Thông tin người đặt</b> <br>

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
            <span>
            <?php
                $pay = Session::get('payment_method');
                echo $pay;
            ?>
            </span>
        </div>

    </div>
    <?php
        $content = Cart::content();
    ?>
    <div class="righty">
        <br>
        <b>Thông tin đơn hàng</b>
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