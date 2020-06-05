@if(Auth::check())

<!DOCTYPE html>
<html>
<head>

</head>
<body>

<p>hello: <?php echo $info->name ?></p>
<p>hello: <?php echo $id ?></p>
<br>
<a href="{{url('logout')}}">logout</a>
</body>
</html>
@endif


<!DOCTYPE html>
<html>
<head>
    <style>
        body{
            text-align: center;
            margin-top: 100px;
        }
        h2{
            font-size: 40px;
        }
        form{
            font-size: 22px;
        }
    </style>
</head>
<body>

<?php
if (isset($name)) {
    header("Location: http://localhost/btl_web/public/access");
    exit;

} else {

    ?>
<h2>Login</h2>


<form action="{{route('info')}}" method = "post">
{{ csrf_field() }}
  <label for="username">username</label>
  <input type="text" id= "username" name="name">
  <br>
  <label for="password">password</label>
  <input type="pass" id = "password" name="pass">

  <input type="submit" name='submit'>
</form>
<?php
}
?>
</body>
</html>

