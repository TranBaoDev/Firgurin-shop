<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" type="image/x-icon" href="frontend/img/our-damn-logo.ico" sizes="32x32" />
        <link rel="stylesheet" href="{{asset('frontend/css/navbar.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/css/login.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/font/Quicksand/quicksand.css')}}">
        <link rel="stylesheet"
            href="{{asset('frontend/fontawesome-free-6.2.0-web/css/all.css')}}">
        <title>Fingurin - Đăng nhập</title>
        <script src="{{asset('frontend/js/login.js')}}" defer></script>
    </head>
    <body>
        <div class="login">
            <div class="transit">
            </div>
            <div class="transit trans2">
            </div>
            <div class="transit trans3">
            </div>
            <div class="box">
                <form action="{{URL::to('/admin_dashboard')}}" method="post">
                    <div class="login__box login__part" >
                        <img src="{{asset('frontend/img/logo.webp')}}" alt="">
                        <b>Chào mừng quay lại!</b>
                        <span>Chúng tôi nhớ bạn lắm rồi đấy!</span>
                        {{ csrf_field() }}
                        <input type="text" name="admin_email" placeholder="Tài khoản">
                        <input type="password" name="admin_password" placeholder="Mật khẩu">
        
                        <a class="forgot__btn">Quên mật khẩu?</a>
                        <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span  class="text-alert">',$message.'</span>';
                                Session::pull('message', null);
                            }
                        ?>

                        <button class="price__button__add price__button--hover li-text">
                            <span>Đăng nhập</span>
                        </button>
                        <div class="register-btn btn">Không có tài khoản, <span>
                                đăng kí
                            </span> nào!</div>
                    </div>
                </form>
    
                <div class="login__box register__part">
                    <img src="{{asset('frontend/img/logo.webp')}}" alt="">
                    <b>Bạn là người mới sao?</b>
                    <span>Tạo tài khoản để ngắm figure nào!</span>
    
                    <input class="regis--user" type="text" placeholder="Tài khoản">
                    <input class="regis--pass" type="password" placeholder="Mật khẩu">
                    <input class="regis--pass2" type="password" placeholder="Xác nhận mật khẩu">
                    <input class="regis--gmail" type="text" placeholder="Gmail" value="">
    
                    <button class="price__button__add price__button--hover li-text regis--btn">
                        <span>Đăng kí</span>
                    </button>
    
                    <div class="login-btn btn">Có tài khoản hả, <span>đăng nhập</span> đi!</div>
                </div>

                <div class="login__box forgot__part">
                    <img src="{{asset('frontend/img/logo.webp')}}" alt="">
                    <b>Quên mật khẩu à?</b>
                    <span>Nhạp vào đây gmail của bạn!</span>

                    <input class="regis--gmail" type="text" placeholder="Gmail" value="">
    
                    <button class="price__button__add price__button--hover li-text regis--btn">
                        <span>Tiếp theo</span>
                    </button>
    
                    <div class="login-btn btn">Có tài khoản hả, <span>đăng nhập</span> đi!</div>
                </div>
            </div>
        </div>

    </body>
</html>