
<html>
    <head>
        <title>Trang Đăng ký</title>
        <meta charset="utf-8" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <!-- <link type="text/css" rel="stylesheet" href="regis.css" /> -->
        <link rel="stylesheet" href="{{asset('css/regis.css')}}">
        <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
        <link rel="stylesheet" href="{{asset('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css')}}">

        <script src="{{ asset('js/jquery.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('js/bootstrap.min.js')}}"  type="text/javascript"></script>
        <!-- <script src="{{ asset('js/validateRegister.js')}}" type="text/javascript"></script> -->

        <script type="text/javascript">

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
        });

        function validateEmail() {
            var emailCheck = new RegExp("^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$");
            if ( emailCheck.test($('#mail').val())) {
                return true;
            } else {
                return false;
            }
        }

        function validatePhone() {
            var telCheck  = new RegExp("((0)+([0-9]{9,10}))");
            if ( telCheck.test($('#phone').val())) {
            return true;

            } else {
            return false;

            }
        }


        function validateUser() {
            var userCheck  = new RegExp("^[a-z0-9_-]{8,16}$");
            if ( userCheck.test($('#username').val())) {
            return true;
            } else {
            return false;
            }
        }
        function validatePass() {

            var userCheck  = new RegExp("^[A-Za-z0-9_]{8,15}");
            if ( userCheck.test($('#password').val())) {
            return true;

            } else {
            return false;

            }
        }
        function validatePassConf() {
            if($('#password').val() === $('#password_conf').val())
                return true;
            return false;
        }


        function check(){

            if (validateUser() && validateEmail() && validatePhone() &&validatePass() && validatePassConf()) {

                $.ajax({
               type:'POST',
               url: 'ajaxtest',
               data:{
                mail : $('#mail').val(),
                pass : $('#password').val(),
                name : $('#username').val(),
                _token: "{{csrf_token()}}"
               },
               success: function(res) {
                    alert(res);
               }
                });

                // alert('Đăng ký thành công');
               // return true;
            } else {
                if(!validateEmail()){
                alert ('Mail sai cú pháp');
            }
            else if(!validateUser()){
                alert ('Tên đầy đủ phải có 8-16 kí tự, gồm chữ cái, chữ số hoặc dấu gạch dưới');
             }
            else if(!validatePhone()){
                alert ('số điện thoại phải đúng 10-11 chữ số ');
            }
            else if(!validatePass()){
                alert ('Mật khẩu phải có 8 kí tự trở lên');
            }
            else {
                alert ('Mật khẩu không trùng nhau');
            }
            }
          //  return false;
        }



       function sendAjax() {
           $.get('ajaxtest', function (data) {
               alert(data);
           });
       }

</script>
    </head>
    <body>
        <div class="container-fluid">
            <section class="container">
                <div class="container-page">
                    <div class="col-md-6">
                        <div class="brand_logo_container">
                            <img src="image/Capture.PNG" class="brand_logo" alt="Logo">
                        </div>
                    </div>
                    <!-- <form onsubmit="return check()" action="{{route('login')}}" method="post"> -->
                    <form>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="col-md-6">
                        <h3 >Đăng ký</h3>

                        <div class="form-group col-lg-12">
                            <label>Mail đăng nhập</label>
                            <input type="text" name="mail" class="form-control" id="mail" value="">
                        </div>

                        <div class="form-group col-lg-6">
                            <label>Mật khẩu</label>
                            <input type="password" name="password" class="form-control" id="password" value="">
                        </div>

                        <div class="form-group col-lg-6">
                            <label>Nhập lại mật khẩu</label>
                            <input type="password" name="password_conf" class="form-control" id="password_conf" value="">
                        </div>

                        <div class="form-group col-lg-6">
                            <label>Tên đầy đủ</label>
                            <input type="text" name="username" class="form-control" id="username" value="">
                        </div>

                        <div class="form-group col-lg-6">
                            <label>Số điện thoại</label>
                            <input type="text" name="phone" class="form-control" id="phone" value="">
                        </div>

                    </div>

                    <div class="col-md-6">
                        <div class="d-flex justify-content-center links">
                            Bạn đã có tài khoản <a href="{{url('login')}}" class="ml-2">Đăng nhập ngay</a>
                        </div>
                        <br>
                        <div class="col-md-6">
                        <button class="btn btn-primary btnn" id="submit" type='button' value='Submit' onclick="check()">Đăng ký</button>
                        </div>
                    </div>
                </div>
                </form>
            </section>
        </div>
    </body>
</html>
