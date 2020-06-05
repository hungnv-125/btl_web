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

$.ajaxSetup({

headers: {

    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

}

});

function check(){

    if (validateUser() && validateEmail() && validatePhone() &&validatePass() && validatePassConf()) {



        $.ajax({
       type:'GET',
       url:'http://localhost/btl_web/public/ajaxtest',
       data:{
           mail : $('#mail').val()
       },
       success:function(data) {
          alert(data.msg);
       }
        });

        alert('Đăng ký thành công');
        return true;
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
    return false;
}