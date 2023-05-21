@extends('layout')
@section('content')
    @foreach ($product_details as $key => $value)
        <title>{{ $value->product_name }}</title>
    @endforeach
    <title>Sản phẩm</title>
    <link rel="icon" type="image/png" href="{{ asset('frontend/img/our damn logo.png') }}" sizes="32x32" />
    <link rel="stylesheet" href="{{ asset('frontend/css/product.css') }}">
    <script src="{{ asset('frontend/js/product.js') }}" defer></script>
    <div class="directory">
        <a href="{{ URL::to('/trang-chu') }}">Trang chủ</a>
        @foreach ($product_details as $key => $value)
            <a href="{{ URL::to('/danh-muc-san-pham/' . $value->category_id) }}">{{ $value->category_name }}</a>
        @endforeach
        @foreach ($product_details as $key => $value)
            <span class="product__name">{{ $value->product_name }}</span>
        @endforeach
    </div>
    @foreach ($product_details as $key => $value)
        <div class="main">
            <div class="product">
                <div class="product__image slider" data-speed="0">
                    <div class="image__left">
                        <img class="img-list li-text" src="{{ URL::to('/uploads/product/' . $value->product_image) }}"
                            alt="">
                        <img class="img-list li-text" src="{{ URL::to('/uploads/product/' . $value->product_image2) }}"
                            alt="">
                        <img class="img-list li-text" src="{{ URL::to('/uploads/product/' . $value->product_image3) }}"
                            alt="">
                        <img class="img-list li-text" src="{{ URL::to('/uploads/product/' . $value->product_image4) }}"
                            alt="">
                        
                    </div>
                    <div class="image__right">
                        <div class="image__slide">
                            <img class="img-list li-text" src="{{ URL::to('/uploads/product/' . $value->product_image) }}"
                                alt="">
                            <img class="img-list li-text" src="{{ URL::to('/uploads/product/' . $value->product_image2) }}"
                                alt="">
                            <img class="img-list li-text" src="{{ URL::to('/uploads/product/' . $value->product_image3) }}"
                                alt="">
                            <img class="img-list li-text" src="{{ URL::to('/uploads/product/' . $value->product_image4) }}"
                                alt="">
                        </div>
                    </div>
                </div>
                <div class="product__right">
                    <div class="product__info">
                        <f><b>{{ $value->product_name }}</b></f>
                        <f><b>{{ number_format($value->product_price, 0, ',', ',') . '₫' }}</b></f>
                    </div>

                    <div class="product__buy">
                        <form class="btn--form" action="{{ URL::to('/save-cart') }}" method="POST">
                            @csrf
                            <div class="buy__ammount li-text">
                                <?php
                                $v_qty = isset($_POST['qty']) ? $_POST['qty'] : 1; //to be displayed
                                if (isset($_POST['incqty'])) {
                                    $v_qty += 1;
                                }
                                
                                if (isset($_POST['decqty'])) {
                                    $v_qty -= 1;
                                }
                                ?>

                                <button type="button" class="ammount-sub" name="decqty">-</button>
                                <input class="ammount-input" name="qty" type="tel" size="1" value='<?= $v_qty; ?>'/>
                                <button type="button" class="ammount-add" name="incqty">+</button>
                            </div>

                            <input name="productID_hidden" type="hidden" value="{{ $value->product_id }}" />
                            {{-- <input class="ammount-input" name="qty" type="hidden" value="1"> --}}
                                <button type="submit" class="price__button__add2 price__button--hover2  li-text">
                                <i class="fa-solid fa-cart-shopping"></i>
                                <span>Thêm vào giỏ</span>
                                </button>
                        </form>
                    </div>

                    <div class="product__rule">
                        <div class="rule">
                            <span><b>✔ Sản phẩm chính hãng từ Nhật Bản.</b></span>
                            <span><b>✔ Trước khi bạn đặt mua :</b> vui lòng check lại giá hiện tại với admin, vì khả năng
                                giá đã thay đổi so với lần cập nhật gần nhất, hoặc hết hàng, hết suất order. Do giới hạn số
                                lượng,
                                figure Nhật sẽ hiếm dần theo thời gian, dẫn tới giá tăng.</span>
                        </div>
                        <div class="rule">
                            <span>✔ Với sản phẩm <b>CÓ SẴN, bạn sẽ được giao ngay.</b></span>
                            <span>✔ Với sản phẩm <b>ĐẶT TRƯỚC, bạn cần cọc 50% giá trị sản phẩm.</b> Hàng về VN khoảng 2-3
                                tuần sau khi phát hành. Lịch phát hành dự kiến như thông tin chi tiết bên dưới. Với sản phẩm
                                CÓ SẴN, bạn sẽ được giao ngay.</span>
                        </div>
                        <div class="rule">
                            <span>✔ Giao hàng tận nơi</span>
                            <span>✔ Miễn phí ship với các đơn hàng >1000K </span>
                            <span>✔ Vui lòng kiểm tra sản phẩm khi nhận bưu kiện Giao hàng tận nơi</span>
                        </div>
                    </div>

                    <div class="product__detail">
                        <span><b>Thông tin sản phẩm</b></span>
                        <span class="product__highlight">{{ $value->product_price_update }}
                            {{ number_format($value->product_price, 0, ',', ',') . '₫' }}</span>
                        <span>Danh mục: {{ $value->category_name }}</span>
                        <span>Hãng sản xuất: {{ $value->brand_name }}</span>

                        <span>Nhân vật: {!! $value->product_desc !!}</span>
                        <span>Series: {!! $value->product_series !!}</span>
                        <span>Tỷ lệ: {!! $value->product_proportion !!}</span>
                        <span>Kích thước: {!! $value->product_size !!}</span>
                        <span>Ngày phát hành: {!! $value->product_date !!}</span>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <div class="related">
        <span class="related__span">Sản phẩm liên quan</span>
        <div class="cata__contain">
            <div class="product2">
                @foreach ($relate as $key => $relate_pro)
                    <div class="product__item">
                        <a href="{{ URL::to('/chi-tiet-san-pham/' . $relate_pro->product_id) }}">
                            <img src="{{ asset('uploads/product/' . $relate_pro->product_image) }}" alt="">
                        </a>
                        <div class="product__item__price">
                            <f title="{{ $relate_pro->product_name }}">{{ $relate_pro->product_name }}</f>
                            <span>{{ number_format($relate_pro->product_price, 0, ',', ',') . '₫' }}</span>
                            <div class="price__button">
                                <form action="{{ URL::to('/save-cart') }}" method="POST">
                                    @csrf
                                    <input name="productID_hidden" type="hidden" value="{{ $relate_pro->product_id }}" />
                                    <button class="price__button__add price__button--hover">
                                        <i class="fa-solid fa-cart-shopping"></i>
                                        <span>Thêm vào giỏ</span>
                                    </button>
                                </form>
                                <form action="{{ URL::to('/chi-tiet-san-pham/' . $relate_pro->product_id) }}">
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
@endsection
