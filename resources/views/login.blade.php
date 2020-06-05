<?php
// if (isset($mail)) {
if (false) {
    header("Location: http://localhost/btl_web/public/home");
    exit;

} else {

    ?>

<!DOCTYPE html>
<html>

<head>
	<title>Trang đăng nhập</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <script src="{{ asset('js/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('js/bootstrap.min.js')}}"  type="text/javascript"></script>
    <script src="{{ asset('js/bootstrap.js')}}"  type="text/javascript"></script>

    <link type="text/css" rel="stylesheet" href="{{asset('css/login.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
</head>
<!--Coded with love by Mutiullah Samim-->
<body>
	<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="image/Capture.PNG" class="brand_logo" alt="Logo">
					</div>
				</div>

				<div class="d-flex justify-content-center form_container">
					<form action="{{route('info')}}" method = "post">
                    {{ csrf_field() }}
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" name="mail" class="form-control input_user" value="" placeholder="Mail đăng nhập">
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" name="pass" class="form-control input_pass" value="" placeholder="Mật khẩu">
						</div>
						<div class="form-group">
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="customControlInline">
								<label class="custom-control-label" for="customControlInline">Ghi nhớ</label>
							</div>
						</div>
							<div class="d-flex justify-content-center mt-3 login_container">
                     <button type="submit" name="button" class="btn login_btn">Login</button>

				   </div>
					</form>
				</div>

				<div class="mt-4">
					<div class="d-flex justify-content-center links">
						Bạn chưa có tài khoản? <a href="{{url('/register')}}" class="ml-2">Đăng ký ngay</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>

<?php
}
?>