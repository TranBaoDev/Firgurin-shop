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
        <title>Fingurin - Quên mật khẩu</title>
        <!-- <script src="asset/js/login.js" defer></script> -->
    </head>
    <body>
        <div class="login">
            <form onSubmit="return validate();" action="{{URL::to('/change')}}" method="put" class="box" style="margin-top: 0;">
                <div class="login__box forgot__part">
                <img src="{{asset('frontend/img/logo.webp')}}" alt="">
                    <b>Nhập mật khẩu mới nào</b>
                    <span>gawd damn!</span>

                    <input name="new_pass" class="regis--pass" type="password" placeholder="Mật khẩu">
                    <input class="regis--pass2" type="password" placeholder="Xác nhận mật khẩu">
    
                    <button class="price__button__add price__button--hover li-text regis--btn">
                        <span>Tiếp theo</span>
                    </button>
                </div>
            </form>
        </div>

<script>
    function validate() {
        const regis_pass =document.querySelector('.regis--pass');
        const regis_pass2 =document.querySelector('.regis--pass2');

        if (regis_pass.value == "") {
            regis_pass.placeholder = "⚠️ Bạn chưa nhập mật khẩu mới";
            regis_pass.style.animation = "pop cubic-bezier(.12,.53,.25,1.1) 0.5s";
            return false;
        }

        if (regis_pass2.value != regis_pass.value) {
            regis_pass2.placeholder = "⚠️ Mật khẩu không trùng";
            regis_pass2.style.animation = "pop cubic-bezier(.12,.53,.25,1.1) 0.5s";
            regis_pass2.value ="";
            return false;
        }
}
</script>
    </body>
</html>