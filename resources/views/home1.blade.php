<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="{{asset('css/home.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css')}}">

    <script src="{{ asset('js/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('js/bootstrap.min.js')}}"  type="text/javascript"></script>
    <script src="{{ asset('js/home.js')}}"  type="text/javascript"></script>

    <title>Home</title>
    <style>
        body{
            background:#E0FFFF;
            }

            </style>
</head>
<body>
     <!-- start header -->
     <div id="header">
        <div class="container-fuild">
            <div class="row">
              <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                 <div class="head-item dropdown"><button class="btn btn-info" type="submit"><span class="glyphicon glyphicon-home"></span></button></div>

                 <div class="head-item ">
                  <button class="btn btn-info " type="submit"  data-toggle="dropdown" ><span class="glyphicon glyphicon-object-align-top"> </span> <span class="boards"> Boards</span></button>
                  <ul class="dropdown-menu drop-board">
                    <li class="drop-header"> <span class=" glyphicon glyphicon-star-empty "></span> Starred Boards</li>
                    <li class="drop-list"><a href="#">Tên </a></li>
                    <li class="drop-list"><a href="#">Stared</a></li>
                    <li class="drop-list"><a href="#">Project</a></li>
                    <li class="divider"></li>
                    <li class="drop-header"><span class=" glyphicon glyphicon-user"></span> Personal Boards</li>
                    <li class="drop-list"><a href="#">Tên Personal Project </a></li>
                  </ul>
                </div>
                 <div class="head-item searchbox">
                    <form class="form-inline">
                            <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                     </form>
                 </div>
                 <div class="search">
                  <button type="submit" class="btn btn-outline-light btn-sm" ><span class="glyphicon glyphicon-search"></span></button>
                 </div>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                  <div id="user" class="user-<?php echo $id ?>">
                    <a href="#"><img width="38px" src="{{$info->image}}"></a>
                  </div>
                  <div class="head-item2 dropdown ">
                  <button class="btn btn-info " type="submit" data-toggle="dropdown"><span class="glyphicon glyphicon-bell"  ></span></button>
                  <ul class="dropdown-menu dropdown-menu-right">
                    <li class="drop-header">Notifications</li>
                    <li class="divider"></li>
                    <li class="drop-list"><a href="#">Chưa</a></li>
                    <li class="drop-list"><a href="#">Có</a></li>
                    <li class="drop-list"><a href="#">Thông</a></li>
                    <li class="drop-list"><a href="#">Báo </a></li>
                  </ul>

                  </div>
                  <div class="head-item2">
                  <button class="btn btn-info " type="submit"><span class="glyphicon glyphicon glyphicon-info-sign"></span></button>
                  </div>
                  <div class="head-item2 ">
                  <button id="add" class="btn btn-info " type="submit"  data-toggle="modal" data-target="#addProjectModal"><span class="glyphicon glyphicon-plus"></span></button>
                  </div>

                  </div>

            </div>

        </div>
    </div>
    <!-- end header -->

    <!-- start body -->
   <div class="container">
       <div class="row">
           <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
               <div class="star">
                   <h4 class="h">  <span class="bigstar glyphicon glyphicon-star"></span> Starred Boards</h4>
                   <div class="row">
                       <div class="col-lg-3 col-sm-4 col-md-4 col-xs-6">
                         <a href="">
                         <div class="item">
                          <span class="project">Project Name</span>
                          <span class="glyphicon glyphicon-star-empty"></span>
                         </div>
                        </a>
                       </div>

                       <div class="col-lg-3 col-sm-4 col-md-4 col-xs-6 ">
                        <a href="">
                          <div class="item">
                           <span class="project">Project Name</span>
                           <span class="glyphicon glyphicon-star-empty"></span>
                          </div>
                         </a>
                       </div>
                       <div class="col-lg-3 col-sm-4 col-md-4 col-xs-6">

                       </div>



                   </div>

               </div>

               <div class="personal">
                <h4 class="h">  <span class="bigstar glyphicon glyphicon-user"></span> Personal Boards</h4>
                <div class="row">
                @foreach ($project as $prj)
                <div class="col-lg-3 col-sm-4 col-md-4 col-xs-6" onclick="redirectPrj(<?php echo $prj->id ?>)">
                    <a href="http://localhost/btl_web/public/project?user=<?php echo $id ?>&&prj=<?php echo $prj->id ?>">
                      <div class="item">
                       <span class="project">{{$prj->name}}</span>

                      </div>
                     </a>
                   </div>
                   @endforeach

                   <div class="col-lg-3  col-sm-4 col-md-4 col-xs-6 ad">
                    <a href="" data-toggle="modal" data-target="#addProjectModal">
                      <div class="add">
                       + Add Project

                      </div>
                     </a>
                   </div>
                </div>

               </div>

           </div>

           <div class="col-lg-3">
           </div>

       </div>

   </div>
   <!-- The Modal -->
  <!-- Modal -->


  <!-- Modal -->
  <div class="modal fade" id="addProjectModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <span class="modal-title">Add Project</span>
          <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>
        <div class="modal-body">
          <label>Fill name of project : </label>
          <input class="form-control" type="text" id="nameProject" value="name of project">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" onclick="myFunction2()">Add</button>
        </div>
      </div>

    </div>
  </div>
    <!-- end body -->

    <script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
});
      function myFunction2() {

      var name= $('#nameProject').val();

      $.ajax({
               type:'POST',
               url: 'addPrj',
               data:{
                id_user : {{$id}},
                name : name,
                _token: "{{csrf_token()}}"
               },
               success: function(res) {
                    // alert(res);
               }
                });

      $('.ad').before('<div class="col-lg-3 col-sm-4 col-md-4 col-xs-6">'
                   + '<a href="">'
                    +  '<div class="item">'
                     +  '<span class="project">'+name+'</span>'

                     + '</div>'
                    + '</a>'
                   +'</div>')
      }


      function redirectPrj(id_prj){
        id_user = $('#user').attr('class').slice(5);

        $.ajax({
               type:'POST',
               url: 'project/'+id_prj,
               data:{
                id_user : id_user,
                _token: "{{csrf_token()}}"
               },
               success: function(res) {
                    // alert(res);
               }
                });
      }
    </script>
</body>
<!-- </html>
