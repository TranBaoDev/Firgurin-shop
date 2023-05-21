@extends('layout')
@section('content')
    <title>Figurin - Tài khoản</title>
    <link rel="stylesheet" href="{{ asset('frontend/css/info.css') }}">
    <script src="{{ asset('frontend/js/info.js') }}" defer></script>

    <div class="title">
        <b>Tài khoản của bạn</b>
    </div>

    <div class="info">
        <div class="left">
            <b>Tài khoản</b>
            <ul>
                <li class="li-text">Thông tin tài khoản</li>
                <li class="li-text"><a href="/log_out_user">Đăng xuất</a></li>
            </ul>
        </div>
        <div class="right">
            <div class="right__info right--info">
                <b>
                    Thông tin tài khoản
                    <i class="li-text right--btn fa-regular fa-pen-to-square"></i>
                </b>
                <span>Tên tài khoản : <?php
                $name = Session::get('user_name');
                if ($name) {
                    echo $name;
                }
                ?></span>
                <span>Gmail : <?php
                $gmail = Session::get('user_gmail');
                if ($gmail) {
                    echo $gmail;
                }
                ?></span>

                <span>Số điện thoại : <?php
                $phone = Session::get('user_phone');
                if ($phone) {
                    echo $phone;
                }
                ?></span>
                <span>Địa chỉ : <?php
                $address = Session::get('user_address');
                if ($address) {
                    echo $address;
                }
                ?></span>
            </div>
            <form class="right__info right--change" action="{{URL::to('/detail_change')}}">
                <b>
                    Thay đổi thông tin tài khoản
                </b>
                <span>Tên tài khoản :
                    <input name="name" type="text">
                </span>
                <span>Số điện thoại :
                    <input name="phone" type="text">
                </span>
                <span>Địa chỉ :
                    <input name="address" type="text">
                </span>

                <div class="change">
                    <button name="update_user">Thêm mới</button>
                    hoặc bạn muốn
                    <a href="">Hủy</a>
                </div>
            </form>
        </div>
    </div>
@endsection
