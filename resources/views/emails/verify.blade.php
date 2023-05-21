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
    <p>Bạn đã đăng kí tài khoản tại hệ thống của chúng tôi bằng Gmail : <b>{{$gmail}}</b>.</p>
    <p>Để có thể tiếp tục sử dụng dịch vụ bạn vui lòng nhấn vào nút kích hoạt ở dưới để có thể kích hoạt tài khoản của bạn.</p>
    <form action="{{URL::to('/verify')}}">
        <button>Xác nhận tài khoản Gmail</button>
    </form>
</div>