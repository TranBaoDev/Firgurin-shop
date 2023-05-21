@extends('layout')
@section('content')
    <title>Giỏ hàng của bạn</title>
    <link rel="stylesheet" href="{{ asset('frontend/css/cart.css') }}">
    <script src="{{ asset('frontend/js/cart.js') }}" defer></script>


    <div class="directory">
        <a href="{{ URL::to('/trang-chu') }}">Trang chủ</a>
        <span>Giỏ hàng</span>
    </div>

    <div class="title">Giỏ hàng của bạn</div>

    <?php
    $content = Cart::content();
    ?>
    <div class="cart">
        <div class="cart__left">
            <div class="cart__head">
                <span>Bạn đang có </span>
                <b class="ammount">
                    0
                </b>
                <span> sản phẩm trong giỏ</span>
            </div>
            @foreach ($content as $v_content)
                <div class="cart__product">
                    <div class="cart__item">
                        <div class="item__top">
                            <form action="update-to-cart" method="POST">
                                <div class="item__info">
                                    <img src="{{ asset('uploads/product/' . $v_content->options->image) }}" alt="">
                                    <div class="details">
                                        <b>{{ $v_content->name }}</b>
                                        <div class="buy__ammount li-text">
                                            <button class="ammount-sub">-</button>
                                            <input class="ammount-input" type="tel" value="{{ $v_content->qty }}"
                                                name="cart_quantity">
                                            <button class="ammount-add">+</button>
                                        </div>
                                        <b class="price">{{ number_format($v_content->price, 0, ',', '.') . '₫' }}</b>
                                    </div>
                                </div>
                                @csrf
                                <input type="hidden" name="rowId_cart" value="{{ $v_content->rowId }}">
                                {{-- <button name="update_qty" href="{{ URL::to('/update-to-cart/' . $v_content->rowId) }}"
                                    style="color: black"><i class="fa-regular fa-pen-to-square li-text"></i></button> --}}
                            </form>
                            <a href="{{ URL::to('/delete-to-cart/' . $v_content->rowId) }}" style="color: black"><i
                                    class="fa-regular fa-trash-can li-text"></i></a>
                        </div>
                        <div class="item__bot">
                            <b>Thành tiền :</b>
                            <span class="total">
                                <?php
                                $subtotal = $v_content->price * $v_content->qty;
                                echo number_format($subtotal) . '₫';
                                ?>
                            </span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="cart__right">
            <span>Thông tin đơn hàng</span>
            <div class="right__total">
                <b>Tổng tiền :</b>
                <b class="order__total">{{ Cart::subtotal() . '₫' }}</b>
            </div>
            <ul>
                <li>Phí vận chuyển sẽ được tính ở trang thanh toán.</li>
                <li>Bạn cũng có thể nhập mã giảm giá ở trang thanh toán.</li>
            </ul>
            <?php
                    $user_id = Session::get('user_id');
                    if($user_id!=Null){
            ?>
                <a href="{{ URL::to('/thanh-toan') }}">
                    <button class="price__button__add price__button--hover li-text">
                        <span>Thanh toán</span>
                    </button>
                </a>
            <?php
                    }else{
            ?>
            <a href="{{ URL::to('/login') }}">
                <button class="price__button__add price__button--hover li-text">
                    <span>Thanh toán</span>
                </button>
            </a>
            <?php
                    }
            ?>
        </div>
    </div>
@endsection
