<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"><script src="js/jquery-3.3.1.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
<!------ Include the above in your HEAD tag ---------->
<head>
<meta charset="utf-8" />
<!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
 <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.css" />
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
<script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
<link type="text/css" rel="stylesheet" href="freecode.css" /> -->

<link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <script src="{{ asset('js/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('js/bootstrap.min.js')}}"  type="text/javascript"></script>
    <script src="{{ asset('js/bootstrap.js')}}"  type="text/javascript"></script>
    <script src="{{ asset('js/jquery.fancybox.min.js')}}"  type="text/javascript"></script>
    <script src="{{ asset('js/wow.min.js')}}"  type="text/javascript"></script>
    <link type="text/css" rel="stylesheet" href="{{asset('css/freecode.css')}}">

</head>
<body>

   <nav class="navbar fixed-top navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="index.html">
                <h3 class="my-heading ">GROUPS<span class="bg-main">7</span></h3>
            </a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa fa-bars mfa-white"></span>
            </button>

            <div id="main">
                <a href="javascript:void(0)" class="openNav"><span class="fa fa-bars" onclick="openNav()"></span></a>
            </div>



        <div id="mySidenav" class="sidenav">
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">=></a>
          <ul class="mob-ul">
             <li class="nav-item"><a class="nav-link" href="<?php echo url('login') ?>">Đăng nhập</a></li>
             <li class="nav-item"><a class="nav-link" href="<?php echo url('register') ?>">Register</a></li>

          </ul>
        </div>


            <div class="collapse navbar-collapse" id="navbarResponsive">

                <ul class="navbar-nav ml-auto">
                    <li class="nav-link">
                        <a class="btn btn-primary btn-block btn-login" href="<?php echo url('login') ?>">Login</a>
                    </li>
                    <li class="nav-link">
                        <a class="btn btn-primary btn-block btn-register" href="<?php echo url('register') ?>">Register</a>
                    </li>

                </ul>
            </div>

        </div>
    </nav>


    <header class="masthead text-white ">
        <div class="overlay"></div>
        <div class="container slider-top-text">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h3 class="my-heading"> GROUPS <span class="bg-main">7</span></h3>
                    <p class="myp-slider text-center">Groups 7 giúp bạn làm việc có tính hợp tác hơn và làm được nhiều hơn</p>
                    <p class="myp text-center">KẾT NỐI CÁC THÀNH VIÊN | TẠO CÁC MỐI QUAN HỆ HỢP TÁC | TRIỂN KHAI DỰ ÁN THÀNH CÔNG</p>
                    <a class="btn btn-primary btn-join" href="#">ĐĂNG KÝ NGAY</a>

                </div>
                <div class="col-md-12 text-center mt-5">
                    <div class="scroll-down">
                        <a class="btn btn-default btn-scroll floating-arrow" href="#gobottom" id="bottom"><i class="fa fa-angle-down"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="testimonials m-events" id="gobottom">
        <div class="container">
            <div class="row">
                <div class="col-md-5 mb-3 wow bounceInUp" data-wow-duration="1.4s">
                    <div class="big-img">
                        <img src="image\a2.PNG" class="img-fluid">
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="inner-section wow fadeInUp">
                        <h3>Thông tin <span class="bg-main">về công việc</span></h3>
                        <br>
                        <p class="text-justify">Bạn có thể truy cập nhanh vào xem thông tin ở bất cứ đâu. </p>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="testimonials mybg-events">

        <div class="container">
          <div class="row">
            <div class="col-md-8">
              <div class="inner-section wow fadeInUp">
                  <h3>Tham gia <span class="bg-main">bất cứ nhóm nào</span></h3>
                  <br>
                  <p class="text-justify">Bạn có thể truy cập nhanh vào xem thông tin ở bất cứ đâu. </p>
              </div>
          </div>
            <div class="col-md-12 mb-3 wow bounceInUp" data-wow-duration="1.4s">
              <div class="l-img">
                  <img src="image\a3.PNG" class="img-fluid">
              </div>
          </div>
            </div>
        </div>
    </section>
    <section class="testimonials bg-light" id="marketplace">
      <div class="container">
          <div class="row">
              <div class="col-md-8 mx-auto wow fadeInUp">
                  <h3 class="text-center font-weight-bold">GROUPS<span class="bg-main">7</span> CÁCH LÀM VIỆC</h3>
                  <p class=" text-center">Đi từ ý tưởng đến hành động trong vài giây với các bảng, danh sách và thẻ trực quan đơn giản</p>
              </div>
          </div>
          <div class="row">
              <div class="col-sm-6 col-md-4 col-lg-4 mt-4 wow bounceInUp" data-wow-duration="1.4s">
                  <div class="card">
                      <img class="card-img-top h-262" src="https://images.pexels.com/photos/449627/pexels-photo-449627.jpeg?auto=compress&cs=tinysrgb&h=650&w=940">
                      <div class="card-block">

                          <h4 class="card-title">....</h4>

                          <div class="card-text">
                              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's.</p>
                          </div>
                      </div>
                      <div class="card-footer">
                          <small>$ 170</small>
                          <a href="#" class="pull-right">More Info</a>
                      </div>
                  </div>
              </div>
              <div class="col-sm-6 col-md-4 col-lg-4 mt-4 wow bounceInUp" data-wow-duration="1.4s">
                  <div class="card">
                      <img class="card-img-top h-262" src="https://images.pexels.com/photos/56005/fiji-beach-sand-palm-trees-56005.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940">
                      <div class="card-block">

                          <h4 class="card-title">Lorem Ipsum Dolor Site Amet</h4>

                          <div class="card-text">
                              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's.</p>
                          </div>
                      </div>
                      <div class="card-footer">
                          <small>$ 170</small>
                          <a href="#" class="pull-right">More Info</a>

                      </div>
                  </div>
              </div>

              <div class="col-sm-6 col-md-4 col-lg-4 mt-4 wow bounceInUp" data-wow-duration="1.4s">
                  <div class="card">
                      <img class="card-img-top h-262" src="https://images.pexels.com/photos/753626/pexels-photo-753626.jpeg?auto=compress&cs=tinysrgb&h=650&w=940">
                      <div class="card-block">

                          <h4 class="card-title ">Lorem Ipsum Dolor Site Amet</h4>

                          <div class="card-text ">
                              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's.</p>
                          </div>
                      </div>
                      <div class="card-footer">
                          <small>$ 170</small>
                          <a href="#" class="pull-right">More Info</a>

                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
    <section class="testimonials text-center ">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto wow fadeInUp">
                    <h3 class="text-center font-weight-bold">GROUPS<span class="bg-main">7</span> Hãy làm việc theo cách bạn muốn</h3>
                    <p class=" text-center">Sử dụng Trello theo cách nhóm của bạn làm việc tốt nhất. Chúng tôi đã có sự linh hoạt và các tính năng để phù hợp với bất kỳ phong cách nhóm nào.</p>
                </div>
                <div class="row">
                  <div class="col-sm-6 col-md-4 col-lg-6 mt-4 wow bounceInUp" data-wow-duration="1.4s">
                      <div class="big-img-3">
                          <img src="image\a5.PNG" class="img-fluid">
                      </div>
                  </div>
                  <div class="col-sm-6 col-md-8 col-lg-6 mt-4">
                      <div class="my-right-text wow fadeInUp">

                          <p class="text-justify font-italic"></p>
                          <a href="#" class="link-color">Playbook nhóm</a>
                          <p class="text-muted">Thật dễ dàng để thúc đẩy nhóm của bạn lên và hoạt động với Trello. Chúng tôi đã thu thập tất cả các bảng và công cụ bạn cần để thành công trong một nguồn lực có sẵn.</p>
                      </div>
                  </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-4 col-lg-6 mt-4 wow bounceInUp" data-wow-duration="1.4s">
                        <div class="big-img-3">
                            <img src="image\a4.PNG" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-8 col-lg-6 mt-4">
                        <div class="my-right-text wow fadeInUp">

                            <p class="text-justify font-italic"></p>
                            <a href="#" class="link-color">Nền tảng Hiệu quả</a>
                            <p class="text-muted">Tích hợp trực tiếp các ứng dụng mà nhóm của bạn đã sử dụng vào quy trình làm việc của bạn. Phần mở rộng biến bảng Trello thành các ứng dụng sống động giúp đáp ứng nhu cầu kinh doanh riêng của nhóm bạn.</p>
                        </div>
                     </div>
                </div>
            </div>
        </div>
    </section>


    <footer class="footer bg-dark">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 text-center text-lg-left my-auto  wow zoomIn">
                    <ul class="list-inline mb-2">
                        <li class="list-inline-item">
                            <a href="#">Thông tin</a>
                        </li>
                        <li class="list-inline-item">⋅</li>
                        <li class="list-inline-item">
                            <a href="#">Liên hệ</a>
                        </li>
                        <li class="list-inline-item">⋅</li>
                        <li class="list-inline-item">⋅</li>
                        <li class="list-inline-item">
                            <a href="#">Privacy Policy</a>
                        </li>
                    </ul>
                    <p class="text-muted small mb-4 mb-lg-0">© Mojoave 2018. All Rights Reserved.</p>
                </div>
                <div class="col-lg-6 text-center text-lg-right my-auto  wow zoomIn">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item mr-3">
                            <a href="#">
                                <i class="fa fa-facebook fa-2x fa-fw"></i>
                            </a>
                        </li>
                        <li class="list-inline-item mr-3">
                            <a href="#">
                                <i class="fa fa-twitter fa-2x fa-fw"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">
                                <i class="fa fa-instagram fa-2x fa-fw"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script> -->
     <script>
              new WOW().init();
              </script>
    <script>
        $(window).scroll( function(){


          var topWindow = $(window).scrollTop();
          var topWindow = topWindow * 1.5;
          var windowHeight = $(window).height();
          var position = topWindow / windowHeight;
          position = 1 - position;

          $('#bottom').css('opacity', position);

        });

        function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
            document.getElementById("main").style.display = "0";
            document.body.style.backgroundColor = "white";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
            document.getElementById("main").style.marginRight= "0";
            document.body.style.backgroundColor = "white";
        }


     $(window).on("scroll", function() {
            if ($(this).scrollTop() > 10) {
                $("nav.navbar").addClass("mybg-dark");
                $("nav.navbar").addClass("navbar-shrink");


            } else {
                $("nav.navbar").removeClass("mybg-dark");
                $("nav.navbar").removeClass("navbar-shrink");

            }



        });

        $(function() {
  $('#bottom').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top
        }, 500);
        return false;
      }
    }
  });
});


</script>
<script>
    $(document).ready(function(){
      $(".fancybox").fancybox({
            openEffect: "none",
            closeEffect: "none"
        });
    });
</script>
    </body>
