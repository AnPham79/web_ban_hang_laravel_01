<h1>Đăng kí</h1>
<br>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<br>
<form action="{{ route('process_register') }}" method="POST">
    @csrf
    Tên người dùng
    <br>
    <input type="text" name="name">
    <br>
    email
    <br>
    <input type="text" name="email">
    <br>
    Mật khẩu
    <br>
    <input type="text" name="password">
    <br>
    Địa chỉ
    <br>
    <input type="text" name="address">
    <br>
    Số điện thoại
    <br>
    <input type="text" name="phone">
    <br>
    <button>Đăng kí</button>
</form>