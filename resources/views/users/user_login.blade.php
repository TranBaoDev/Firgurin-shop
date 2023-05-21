<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="frontend/img/our damn logo.png"
            sizes="32x32" />
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
                <form action="{{URL::to('/user_dashboard')}}" method="post">
                    <div class="login__box login__part" >
                        <img src="{{asset('frontend/img/logo.webp')}}" alt="">
                        <b>Chào mừng quay lại!</b>
                        <span>Chúng tôi nhớ bạn lắm rồi đấy!</span>
                        {{ csrf_field() }}
                        <input type="text" name="user_email" placeholder="Gmail">
                        <!-- chỗ này ông chưa sửa admin_email thành user_email nên lỗi dưới cũng vậy -->
                        <input type="password" name="user_password" placeholder="Mật khẩu">
        
                        <a class="forgot__btn">Quên mật khẩu?</a>

                        <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">',$message.'</span>';
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
    
                <form onSubmit="return validate();" action="{{URL::to('/user_register')}}" method="put">
                    <div class="login__box register__part">
                        <img src="{{asset('frontend/img/logo.webp')}}" alt="">
                        <b>Bạn là người mới sao?</b>
                        <span>Tạo tài khoản để ngắm figure nào!</span>
                            
                        <input class="regis--gmail" name="regis_gmail" type="email" placeholder="Gmail">
                        <input class="regis--user" name="regis_name" type="text" placeholder="Tài khoản">
                        <input class="regis--pass" name="regis_pass" type="password" placeholder="Mật khẩu" value="" >
                        <input class="regis--pass2" name="regis_pass2" type="password" placeholder="Xác nhận mật khẩu">
                        <input class="regis--phone" name="regis_phone" type="number" placeholder="Số điện thoại" value="">
        
                        <button class="price__button__add price__button--hover li-text">
                            <span>Đăng kí</span>
                        </button>
        
                        <div class="login-btn btn">Có tài khoản hả, <span>đăng nhập</span> đi!</div>
                    </div>
                </form>

<script>
    // function validate(){
    //     const a = document.getElementById("password");
    //     const b = document.getElementById("confirm_password");
    //     if (a.value != b.value) {
    //         b.value ="";
    //         b.placeholder = "⚠️ Mật khẩu không trùng";
    //         b.style.animation = "pop cubic-bezier(.12,.53,.25,1.1) 0.5s";
    //         return false;
    //     }
    // }
    function validate() {
        const regis_user =document.querySelector('.regis--user');
        const regis_pass =document.querySelector('.regis--pass');
        const regis_pass2 =document.querySelector('.regis--pass2');
        const regis_gmail =document.querySelector('.regis--gmail');
        const regis_phone =document.querySelector('.regis--phone');

        var i = 5;

        if (regis_gmail.value.includes("@gmail.com") != true) {
            regis_gmail.placeholder = "⚠️Bạn chưa nhập đúng Gmail";
            regis_gmail.style.animation = "pop cubic-bezier(.12,.53,.25,1.1) 0.5s";
            regis_gmail.value = "";
            i--;
        }

        if (regis_user.value == "") {
            regis_user.placeholder = "⚠️ Bạn chưa nhập tên đăng nhập";
            regis_user.style.animation = "pop cubic-bezier(.12,.53,.25,1.1) 0.5s";
            i--;
        }

        if (regis_pass.value == "") {
            regis_user.placeholder = "⚠️ Bạn chưa nhập mật khẩu";
            regis_user.style.animation = "pop cubic-bezier(.12,.53,.25,1.1) 0.5s";
            i--;
        }

        if (regis_pass2.value != regis_pass.value) {
            alert('nooo');
            regis_pass2.placeholder = "⚠️ Mật khẩu không trùng";
            regis_pass2.style.animation = "pop cubic-bezier(.12,.53,.25,1.1) 0.5s";
            regis_pass2.value ="";
            i--;
        }

        if (regis_phone.value == "") {
            regis_phone.placeholder = "⚠️ Bạn chưa nhập số điện thoại";
            regis_phone.style.animation = "pop cubic-bezier(.12,.53,.25,1.1) 0.5s";
            i--;
        }

        if (i >= 5) {
            return true;
        } else {
            return false;
        }
}
</script>

                <form action="{{URL::to('/forgot')}}" method="put">
                    <div class="login__box forgot__part">
                        <img src="frontend/img/logo.webp" alt="">
                        <b>Quên mật khẩu à?</b>
                        <span>Nhạp vào đây gmail của bạn!</span>

                        <input name="forgo_gmail" class="regis--gmail" type="text" placeholder="Gmail" value="">
        
                        <button class="price__button__add price__button--hover li-text regis--btn">
                            <span>Tiếp theo</span>
                        </button>
        
                        <div class="login-btn btn">Có tài khoản hả, <span>đăng nhập</span> đi!</div>
                    </div>
                </form>
            </div>
        </div>

    </body>
</html>