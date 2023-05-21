<style>
    .test-email{
        width: 500px;
        margin: 0 auto;
        padding: 15px;
        text-align: center;
    }
    button {
        padding: 10px;
    }
</style>
<div class="test-email">
    <h2>Xin chào {{$name}}</h2>
    <p>Hình như bạn đã quên mật khẩu của tài khoan này</b>.</p>
    <p>Để có thể thay đổi mật khẩu, hãy bấm link dưới đây.</p>
    <form action="{{URL::to('/change_password')}}">
        <button>Thay đổi mật khẩu</button>
    </form>
</div>