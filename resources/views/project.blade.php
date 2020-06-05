<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="project.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="modal.css"> -->

    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- <link rel="stylesheet" href="{{asset('css/home.css')}}">
    <link rel="stylesheet" href="{{asset('css/project.css')}}">
    <link rel="stylesheet" href="{{asset('css/modal.css')}}"> -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/home.css')}}">
    <link rel="stylesheet" href="{{asset('css/project.css')}}">
    <link rel="stylesheet" href="{{asset('css/modal.css')}}">
    <link rel="stylesheet" href="{{asset('css/chat.css')}}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <script src="{{ asset('js/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('js/bootstrap.min.js')}}"  type="text/javascript"></script>
    <script src="{{ asset('js/socket.io.js')}}"  type="text/javascript"></script>
    <script src="{{ asset('js/project.js')}}"  type="text/javascript"></script>

    <style>
body{
    background:rgb(0, 174, 204);
    background: -webkit-linear-gradient(to right, #91EAE4, #86A8E7, #7F7FD5);
    background: linear-gradient(to right, #91EAE4, #86A8E7, #7F7FD5);
    position: fixed;
    width: 100vw;

    }

    </style>

<script>
var socket = io('http://localhost:6001')
$(function() {
  var id_prj = $('.name').attr('id');
  var id_user = $('#user').attr('class').slice(5);
  var room = 'room-' + id_prj;
  var user_image = $('#user > div > img').attr('src');
  var user_name = $('#user > div > img').attr('title');


  // var socket = io('http://localhost:6001')
    socket.on('chat', function (data) {
        if($('.chat-box').css('display') == 'block')
          // generate_message(data, 'self');
          generate_button_message(data)
    })
    socket.emit('room', room);

    socket.on('addcard', function (data) {
      $('.'+data.id_list).before('<div class="list-item" id="'+data.id_card+'"  ondrop="drop(event)" ondragover="allowDrop(event)"'

            +' draggable="true" ondragstart="drag(event)">'
            +' <a href="" data-toggle="modal" data-target="#modal2"> '
                + data.content
              +' </a>'
            +' </div>');
    })
    socket.on('adddes', function (data) {
        $('#description').html(data.content);
    })

    socket.on('updateCheckList', function (data) {
        if(data.status)
          $('#work-'+ data.id_work).attr('checked', 'checked');
        else
          $('#work-'+ data.id_work).removeAttr('checked');
    })

    socket.on('addchecklist', function (data) {
      $('#list_work').append(' <label class="container">' +data.content
            +' <input type="checkbox" id="work-'+data.id_work+'" onclick="updateCheckList('+data.id_work+'">'
            + '<span class="checkmark"></span>'
          +'</label>');
    })

    socket.on('uploadfile', function  (data) {
      $('#list_file').append('<a  class="filename" href="'+data.path+'" download>'+ data.content+'</a>');
    })

    socket.on('moveCard', function (data) {

        var content = $('#'+data.id_drag).html();
        $('#'+data.id_drag).remove();

        $('#'+data.id_drop).before('<div class="list-item" id="'+data.id_drag+'" ondrop="drop(event)"'
              +'ondragover="allowDrop(event)" draggable="true" ondragstart="drag(event)" onclick="showModal('+data.id_drag.slice(4)+')">'
                          +content
              +'</div>');
    })

    socket.on('addList', function (data) {
      $('.add-list').before(  '    <div class="list" id="list-'+data.id_list+'" ></div>');
      $('#list-'+data.id_list).append(data.html);
    })

$("#chat-submit").click(function(e) {
  e.preventDefault();
  var msg = $("#chat-input").val();
  if(msg.trim() == ''){
    return false;
  }
  var data ={
    room : room,
    msg : msg,
    name : user_name,
    image : user_image
  };

  $.ajax({
      type:'POST',
      url: 'saveMess',
      data:{
        id_prj : id_prj,
        id_user : id_user,
        content : msg,
       _token: "{{csrf_token()}}"
      },
      success: function(res) {
      }
    });

  generate_message(data, 'self');
  socket.emit('chat', data);


})


function generate_message(data, type) {

  var str="";
  str += "<div id='cm-msg' class=\"chat-msg "+type+"\">";
  str += "          <span class=\"msg-avatar\">";
  str += "            <img src='"+data.image+"'>";
  str += "          <\/span>";
  str += "          <div class=\"cm-msg-text\">";
  str += data.msg;
  str += "          <\/div>";
  str += "        <\/div>";
  $(".chat-logs").append(str);

  if(type == 'self'){
   $("#chat-input").val('');
  }
  $(".chat-logs").stop().animate({ scrollTop: $(".chat-logs")[0].scrollHeight}, 1000);
}


function generate_button_message(data){

  var str="";
  str +='<div id="cm-msg-2" class="chat-msg user" style="">'
        + '<span class="msg-avatar">'
        + '<img src="'+data.image+'" title="'+data.name+'">'
        + '</span>'
        + '<div class="cm-msg-text">'
        + data.msg
        + '</div>        </div>';

  $(".chat-logs").append(str);

  $(".chat-logs").stop().animate({ scrollTop: $(".chat-logs")[0].scrollHeight}, 1000);

}


$(document).delegate(".chat-btn", "click", function() {
  var value = $(this).attr("chat-value");
  var name = $(this).html();
  $("#chat-input").attr("disabled", false);
  generate_message(name, 'self');
})


$("#chat-circle").click(function() {

  $.ajax({
      type:'POST',
      url: 'showMess',
      data:{
        id_prj : id_prj,
       _token: "{{csrf_token()}}"
      },
      success: function(res) {
        var json = JSON.parse(res);

        $(".chat-logs").html('');

        for(var i = 0; i < json.message.length; i++){
          var data={
            msg : json.message[i].content,
            name : json.user[i].name,
            image : json.user[i].image
          }

          if(json.user[i].id == id_user)
              generate_message(data, 'self');
          else
          generate_button_message(data);
        }
      }
    });

  $("#chat-circle").toggle('scale');
  $(".chat-box").toggle('scale');
})


$(".chat-box-toggle").click(function() {
  $("#chat-circle").toggle('scale');
  $(".chat-box").toggle('scale');
})

})
</script>

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
                <div id="user" class="user-{{$user->id}}">
                  <!-- <a href="#"><img width="38px" src="image/ava1.png"></a> -->
                  <div class="" data-toggle="dropdown"><img width="38px" src="{{$user->image}}" title="{{$user->name}}"></div>
                  <ul class="dropdown-menu dropdown-menu-right dropprofile">
                    <li ><a href="" class="profile-item"><span class="username">full name of user</span></a></li>
                    <hr>
                    <li ><a href="" class="profile-item"><span class="username">Profile and Visibility</span></a></li>
                    <li ><a href="" class="profile-item"><span class="username">Activity</span></a></li>
                    <li ><a href="" class="profile-item"><span class="username">Cards</span></a></li>
                    <li ><a href="" class="profile-item"><span class="username">Setting</span></a></li>
                    <hr>
                    <li ><a href="" class="profile-item"><span class="username">Help</span></a></li>

                    <hr>
                    <li ><a href="" class="profile-item"><span class="username">Log out</span></a></li>

                  <div></div>
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
                <button id="add" class="btn btn-info " type="submit"  data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus"></span></button>
                </div>

                </div>

          </div>

      </div>
  </div>
  <!-- end header -->

    <!-- start body -->
<!-- start board header -->
<div class="board-header">
 <div class="name" id="<?php echo $prj->id ?>">{{$prj->name}}</div>
 <div class="member">Member:
    @foreach($member as $mem)
      <div class="mem">
          <img width="30px" src="{{$mem->image}}" title="<?php echo $mem->name ?>">
      </div>
    @endforeach
 </div>
    <!-- add mem  -->
    <div class="addmem">

      <div class="dropdown">
        <button type="button" class="btn btn-outline-info btn-sm"  id="dropdownMenu2" onclick="showSearch()"><span class="glyphicon glyphicon-plus-sign"></span></button>
        <!-- data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" -->

        <div class="dropdown-menu dropdown2" aria-labelledby="dropdownMenu2">
                <h4 class="modal-title dropdown-item">Add friend</h4>
                <hr>
                <input class="form-control dropdown-item" id="add-member" onkeyup="searchUser()" autocomplete="off" type="text" placeholder="email address or name " autofocus>

                <div class="searchmem">

                </div>
                <hr>
                <button type="button dropdown-item" class="btn btn-default dropbtn" data-dismiss="dropdown" onclick="closeSearch()">Close</button>
                <button type="button dropdown-item" class="btn btn-default dropbtn" >Send invitation</button>

              </div>
        </div>




      </div>
<div class="menu">
    <div class="btn-group">
        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Menu
        </button>
        <div class="dropdown-menu dropdown-menu-right">
          <button class="dropdown-item" type="button">Action</button>
          <button class="dropdown-item" type="button">Another action</button>
          <button class="dropdown-item" type="button">Something else here</button>
        </div>
      </div>
</div>
</div>
<!-- end board header  -->
<div class="container-fuild">
  <div class="row cover">

    @foreach($lists as $list)
    <div class="list" id="list-{{$list->id}}" >
          <!-- name  -->

            <div class="list-name">
                <span class="name-work">{{$list->name}}</span>
                <div class="dropdown setting dropleft" id="dropdownleft">
                  <button class="btn  btn-outline-secondary btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <span class="	glyphicon glyphicon-cog"></span>
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <button class="dropdown-item" type="button">Add Card</button>
                      <button class="dropdown-item" type="button">Copy List</button>
                      <button class="dropdown-item" type="button">Move List</button>
                  </div>
                </div>

            </div>
            <!-- end name -->
            <!-- item  -->

            @foreach($tasks as $task)
                @if(count($task) > 0 && $task[0]->id_list === $list->id)
                    @foreach($task as $t)

                      <!-- <a href="" data-toggle="modal" data-target="#modal2"> -->
                      <div class="list-item" id="drag<?php echo $t->id ?>" ondrop="drop(event)" ondragover="allowDrop(event)"

                      draggable="true" ondragstart="drag(event)" onclick="showModal(<?php echo $t->id ?>)">
                      <!-- <div onclick="showModal("> -->
                      <!-- data-toggle="modal" data-target="#modal2" -->
                          {{$t->name}}
                          <!-- </div> -->
                      </div>

                    @endforeach
                @endif
            @endforeach

            <!-- end item -->
            <!-- add -->
            <div class="list-add-<?php echo $list->id ?>" id="list-add-<?php echo $list->id ?>" ondrop="drop(event)" ondragover="allowDrop(event)">
              <!-- <form id="addcard"> -->
              <div id="locationadd-<?php echo $list->id ?>"></div>
              <button type="button" class="btn btn-outline-secondary btn-block" onclick="showaddcard(<?php echo $list->id ?>)">+ Add Another Card</button>
            <!-- </form> -->
            </div>
            <!-- end add -->
      </div>
    @endforeach


      <div class="add-list">
        <form >
        <div id="locationlist"></div>
        <button type="button" class="btn btn-info btn-block btn-lg" id="addlist" onclick="showaddlist(<?php echo $prj->id ?>)">+ Add Another List</button>
      <!-- </form> -->
      </div>


  </div>
</div>

<!-- start box chat  -->
<div class="boxchat">
  <div id="body">

  <div id="chat-circle" class="btn btn-raised">
        <div id="chat-overlay"></div>
        <i class="material-icons">chat</i>
  </div>

  <div class="chat-box">
    <div class="chat-box-header">
      ChatBot
      <span class="chat-box-toggle"><i class="material-icons">close</i></span>
    </div>
    <div class="chat-box-body">
      <div class="chat-box-overlay">
      </div>
      <div class="chat-logs">

      </div><!--chat-log -->
    </div>
    <div class="chat-input">

      <form>
        <input type="text" id="chat-input" placeholder="Send a message..."/>
        <button type="button" class="chat-link"  onclick="thisFileUpload()"><i class="material-icons">link</i> </button>
        <input type="file" id="file"  class="chat-link"  style="display:none;">
        <button type="submit" class="chat-submit" id="chat-submit"><i class="material-icons">send</i></button>
      </form>
    </div>
  </div>

  </div>
  <!-- end chat 2 -->
  <script>
    function thisFileUpload() {
        document.getElementById("file").click();
    };
  </script>

</div>
<!-- end box chat  -->
    <!-- end body -->



<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <span class="modal-title">Add Project</span>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

      </div>
      <div class="modal-body">
        <label>Fill name of project : </label>
        <input class="form-control" type="text">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Add</button>
      </div>
    </div>

  </div>
</div>


  <!-- Modal main -->
  <div class="modal" id="modal2" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content modal-card ">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title"><span class="glyphicon glyphicon-calendar"></span> title project </h4>
        </div>
        <!-- body modal-->
        <div class="modal-body">

          <div class="modal-body-main">
              <div class="main-member">
                <h4><span class="glyphicon glyphicon-user"></span> Member</h4>
                <div id="list_member" style="display: inline;">
                <div id="user-modal">
                  <a href="#"><img width="33px" src="image/ava1.png"></a>
                </div>
                <div id="user-modal">
                  <a href="#"><img width="33px" src="image/ava1.png"></a>
                </div>
                <div id="user-modal">
                  <a href="#"><img width="33px" src="image/ava1.png"></a>
                </div>
                </div>
                <div class="addmem-modal">
                  <button class="btn btn-outline-info btn-sm" type="submit"data-toggle="modal" data-target="#addfriend"><span class="glyphicon glyphicon-plus-sign"></span></button>
               </div>
              </div>
              <div class="main-description">
                <h4><span class="	glyphicon glyphicon-align-justify"></span> Description </h4>

                <!-- <form name="formDescription" > -->
                  <div id="adddescription">
                  <div id="locationdes"></div>
                  <div  class="description" id="description"  >Describe yourself here...</div>
                </div>
                  <!-- </form> -->

                  <!-- <textarea class="description" placeholder="Describe yourself here..."> </textarea> -->
                <!-- <div class="modal-activity"></div>  ----bỏ -->
              </div>
              <div class="check-list">
                 <h4><span class="	glyphicon glyphicon-check"></span> Checklist</h4>
                 <div class="list-checkbox">
                   <div id='list_work'>
                  <label class="container">mission 1
                    <input type="checkbox" checked="checked">
                    <span class="checkmark"></span>
                  </label>
                  <label class="container">mission 2
                    <input type="checkbox">
                    <span class="checkmark"></span>
                  </label>
                  <label class="container">mission 3
                    <input type="checkbox">
                    <span class="checkmark"></span>
                  </label>
                  <label class="container">mission 4
                    <input type="checkbox">
                    <span class="checkmark"></span>
                  </label>
                </div>
                <div class="locationcheck"> </div>
                <div class="add-check" id="addcheck">
                     <button class="btn add-checklist"  onclick="showinputcheck()">add checklist</button>
                </div>
              </div>

              </div>
              <div class="deadline">
                <h4><span class="glyphicon glyphicon-time"  ></span>Deadline: <input type="date" id="deadline" value=""> </h4>
                  <!-- <div  class="btn changedate " onclick="changedate()">Change</div> -->
                  <!-- <label for="deadline">Deadline: </label> -->

              </div>
              <div class="file">
                <h4><span class="	glyphicon glyphicon-folder-open"  ></span>File:</h4>
                <div id="list_file">
                </div>
               <input type="file" id="myfile" class="inputfile"  multiple>
               <button class="btn btn-secondary" type="button" onclick="uploadFile()">Upload</button>

              </div>
          </div>

        </div>
        <!-- end body modal-->

      </div>
    </div>
  </div>

<script>

    function uploadFile() {
      var id_card = $('.modal-card').attr('id').slice(11);
      var fd = new FormData();
        var files = $('#myfile')[0].files[0];
        fd.append('file',files);
        fd.append('id_card', id_card);

        $.ajax({
            url: 'uploadFile',
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            success: function(res){
                var json = JSON.parse(res);
                // alert(json.file.name);
                $('#list_file').append('<a  class="filename" href="'+json.file.path+'" download>'+ json.file.name+'</a>');
                $('#myfile').val('');

                var data={
                  room : 'room-' + $('.name').attr('id'),
                  content : json.file.name,
                  path : json.file.path
                }

                socket.emit('uploadfile', data);
            },
        });
    }

    function  showModal(id) {
      $.ajax({
        type:'POST',
        url: 'showModal',
        data:{
         id_card : id,
         _token: "{{csrf_token()}}"
        },
        success: function(res) {
          var json = JSON.parse(res);

          var member = "";
          var work ="";
          var file ="";
          var i;


          for(i = 0; i < json.member.length; i++){
            member += '<div id="user-modal">'
                  +'<a href="#"><img title="'+json.member[i].name+'" width="33px" src="'+json.member[i].image+'"></a>'
                +'</div>';
          }

          for(i = 0; i < json.work.length; i++){
            if(json.work[i].status == 1)
                work += '<label class="container">'+ json.work[i].name
                      +'<input type="checkbox" checked="checked" id="work-'+json.work[i].id+'" onclick="updateCheckList('+json.work[i].id+')">'
                      +'<span class="checkmark"></span>'
                    +'</label>';

            else
                work += '<label class="container">'+ json.work[i].name
                      +'<input type="checkbox" id="work-'+json.work[i].id+'" onclick="updateCheckList('+json.work[i].id+')">'
                      +'<span class="checkmark"></span>'
                    +'</label>';
          }


          for(i = 0; i < json.file.length; i++){
            file += '<a  class="filename" id="" href="../files/anh.png" download>'+ json.file[i].name+'</a>';
          }

          $('#list_member').html('');
          $('#list_member').append(member);
          $('#list_work').html('');
          $('#list_work').append(work);
          $('#list_file').html('');
          $('#list_file').append(file);
          $('#deadline').removeAttr('value');
          $('#deadline').attr('value', json.task.deadline);
          $('#description').attr('onclick', 'showdesform(' + json.task.id+')');
          $('#description').html(json.task.description);
          $('.modal-card').removeAttr('id');
          $('.modal-card').attr('id', 'modal-card-'+id);
          $('#modal2').modal();

        }
         });
    }
</script>


    <!-- Modal addfriend-->
    <div class="modal fade" id="addfriend" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Add friend</h4>
          </div>
          <div class="modal-body" >
            <input class="form-control" type="text" placeholder="email address or name ">

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" >Send invitation</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>




</body>
</html>
