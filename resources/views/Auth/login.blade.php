<h1>Đăng nhập tài khoản</h1>

<form action="{{ route('process_login') }}" method="POST">
    @csrf
    Email của bạn
    <br>
    <input type="text" name="email">
    <br>
    <input type="password" name="password" id="Check">
    <p onclick="checkpass()">Xem</p>
    <br>
    <button>Đăng nhập</button>
</form>
<script>
    function checkpass() {
        var checkpass = document.getElementById("Check");
        if(checkpass.type === 'password') {
            checkpass.type = 'text';
        } else {
            checkpass.type = 'password';
        }
    }
</script>
