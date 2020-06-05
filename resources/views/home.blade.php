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
    <link rel="stylesheet" href="modal.css">
    <link rel="stylesheet" href="chat.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->

    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/home.css')}}">
    <link rel="stylesheet" href="{{asset('css/project.css')}}">
    <link rel="stylesheet" href="{{asset('css/modal.css')}}">
    <link rel="stylesheet" href="{{asset('css/chat.css')}}">

    <script src="{{ asset('js/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('js/bootstrap.min.js')}}"  type="text/javascript"></script>
    <script src="{{ asset('js/project.js')}}"  type="text/javascript"></script>

    <style>
body{
    background:rgb(0, 174, 204);
    background: -webkit-linear-gradient(to right, #91EAE4, #86A8E7, #7F7FD5);
    background: linear-gradient(to right, #91EAE4, #86A8E7, #7F7FD5);
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
                <div id="user">
                  <div class="" data-toggle="dropdown"><img width="38px" src="image/ava1.png"></div>
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
    <div class="name">Project Name    </div>
    <div class="member">Member:
        <div class="mem">
            <a href="#"><img width="30px" src="image/ava1.png"></a>
        </div>
        <div class="mem">
            <a href="#"><img width="30px" src="image/ava1.png"></a>
        </div>
        <div class="mem">
            <a href="#"><img width="30px" src="image/ava1.png"></a>
        </div>
    </div>
    <!-- add mem  -->
    <div class="addmem">

      <div class="dropdown">
        <button type="button" class="btn btn-outline-info btn-sm"  id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-plus-sign"></span></button>

        <div class="dropdown-menu dropdown2" aria-labelledby="dropdownMenu2">
                <h4 class="modal-title dropdown-item">Add friend</h4>
                <hr>
                <input class="form-control dropdown-item"  type="text" placeholder="email address or name " autofocus>

                <div class="searchmem">
                  <a href="#" class="w3-bar-item w3-button ">
                    <div class="listfriend mem">
                      <img src="image/ava1.png" width="30px" alt="">
                      <span class="friendname">friend name </span>
                    </div>
                  </a>
                  <a href="#" class="w3-bar-item w3-button ">
                    <div class="listfriend mem">
                      <img src="image/ava1.png" width="30px" alt="">
                      <span class="friendname">friend name </span>
                    </div>
                  </a>
                  <a href="#" class="w3-bar-item w3-button ">
                    <div class="listfriend mem">
                      <img src="image/ava1.png" width="30px" alt="">
                      <span class="friendname">friend name </span>
                    </div>
                  </a>
                  <a href="#" class="w3-bar-item w3-button ">
                    <div class="listfriend mem">
                      <img src="image/ava1.png" width="30px" alt="">
                      <span class="friendname">friend name </span>
                    </div>
                  </a>
                  <a href="#" class="w3-bar-item w3-button ">
                    <div class="listfriend mem">
                      <img src="image/ava1.png" width="30px" alt="">
                      <span class="friendname">friend name </span>
                    </div>
                  </a>

                </div>
                <hr>
                <button type="button dropdown-item" class="btn btn-default dropbtn" data-dismiss="dropdown">Close</button>
                <button type="button dropdown-item" class="btn btn-default dropbtn" >Send invitation</button>

              </div>
        </div>




      </div>
    </div>
    <!-- end add mem -->
    <!-- start menu  -->
    <div class="menu">
      <div class="sidebar w3-bar-block w3-card w3-animate-right" style="display:none;right:0;" id="rightMenu">

        <button onclick="closeRightMenu()" class="w3-bar-item w3-button w3-large closemenu">Close Menu </button>
        <hr>
        <a href="#" class="w3-bar-item w3-button zoom">
          <div class="listfriend mem">
            <img src="image/ava1.png" width="30px" alt="">
            <span class="friendname">friend name </span>
          </div>
        </a>
        <a href="#" class="w3-bar-item w3-button zoom">
          <div class="listfriend mem">
            <img src="image/ava1.png" width="30px" alt="">
            <span class="friendname">friend name </span>
          </div>
        </a>
        <a href="#" class="w3-bar-item w3-button zoom">
          <div class="listfriend mem">
            <img src="image/ava1.png" width="30px" alt="">
            <span class="friendname">friend name </span>
          </div>
        </a>

      </div>
      <div class="side-menu">
        <button class="btn btn-outline-info side-menu" onclick="openRightMenu()">☰ Menu</button>
      </div>
    </div>
    <!-- end menu -->
</div>
<!-- end board header  -->
<div class="container-fuild">
  <div class="row cover">
      <div class="list" id="list" >
          <!-- name  -->

            <div class="list-name">
                <span class="name-work">Cong viec 1</span>
                <div class="dropdown setting">
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

            <div class="list-item" id="drag1" ondrop="drop(event)" ondragover="allowDrop(event)"
            draggable="true" ondragstart="drag(event)">
            <a href="" data-toggle="modal" data-target="#modal2">
                Thiet ke 1
              </a>
            </div>


            <div class="list-item" id="drag2" ondrop="drop(event)" ondragover="allowDrop(event)"
            draggable="true" ondragstart="drag(event)">
            <a href="" data-toggle="modal" data-target="#modal2">
                  Thiet ke 2
                </a>
            </div>


            <div class="list-item" id="drag3" ondrop="drop(event)" ondragover="allowDrop(event)"
            draggable="true" ondragstart="drag(event)">
            <a href="" id="newcard">
                    Thiet ke 3
                  </a>
            </div>

            <!-- end item -->
            <!-- add -->
            <div class="list-add" id="drag7" ondrop="drop(event)" ondragover="allowDrop(event)">
              <!-- <form id="addcard"> -->
              <div id="locationadd"></div>
              <button type="button" class="btn btn-outline-secondary btn-block" onclick="showaddcard()">+ Add Another Card</button>
            <!-- </form> -->
            </div>
            <!-- end add -->
      </div>

      <div class="list" id="list" >
        <!-- name  -->

          <div class="list-name">
              <span class="name-work">Đang làm</span>
              <div class="dropdown setting">
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


          <div class="list-item" id="drag4" ondrop="drop(event)" ondragover="allowDrop(event)"
          draggable="true" ondragstart="drag(event)">
          <a href="" data-toggle="modal" data-target="#modal2">
              Thiet ke 4
            </a>
          </div>


          <div class="list-item" id="drag5" ondrop="drop(event)" ondragover="allowDrop(event)"
          draggable="true" ondragstart="drag(event)">
          <a href="">
                Thiet ke 5
              </a>
          </div>


          <div class="list-item" id="drag6" ondrop="drop(event)" ondragover="allowDrop(event)"
          draggable="true" ondragstart="drag(event)" >
          <a href="" id="newcard" ></a>
                  Thiet ke 6
                </a>
          </div>

          <!-- end item -->
          <!-- add -->
          <div class="list-add-2"  id="drag8" ondrop="drop(event)" ondragover="allowDrop(event)">
            <!-- <form id="addcard"> -->
            <div id=""></div>
            <button type="button" class="btn btn-outline-secondary btn-block" onclick="showaddcard()">+ Add Another Card</button>
          <!-- </form> -->
          </div>

          <!-- end add -->
    </div>

      <div class="add-list">
        <!-- <form > -->
        <div id="locationlist"></div>
        <button type="button" class="btn btn-info btn-block btn-lg" id="addlist" onclick="showaddlist()">+ Add Another List</button>
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
<script type="text/javascript">

      function showaddcard() {
          var data = "<input class='form-control addcard' id='inputcard'  type='text'  placeholder='Enter a title for this card'>"
                  + "<button type='button' class='btn btn-success' onclick='addcard()'>Add Card</button>"
                  +"<button type='button' class='btn btn-success' onclick=\"Closelocation()\">Close</button> ";

          document.getElementById('locationadd').innerHTML = data;

      }
      function Closelocation(){
        $('#locationadd').html('');
      }

  function showaddlist() {
      var data = "<input class='form-control addcard' id='inputlist'  type='text' placeholder='Enter a title for this list'>"
              + "<button type='submit' class='btn btn-success ' onclick='addlist()' >Add List</button>";
      document.getElementById('locationlist').innerHTML = data;
      var x = document.getElementById("addlist");
          x.style.display ="none";
  }

  function showdesform() {
    var des = $('#description').html();
          var data = "<textarea class='input-des' id='inputdes' placeholder='Describe yourself here...'>"+des+" </textarea>"
                  + "<button type='buton' class='btn btn-success btn-save' onclick='adddescription()' >Save</button>"
                  +"<button type='button' class='btn btn-success' onclick='Closedes()'>Close</button> ";

          document.getElementById('locationdes').innerHTML = data;

          var x = document.getElementById("description");
          // x.html('');
          x.style.display ="none";
      }
function allowDrop(ev) {
  ev.preventDefault();
}

function drag(ev) {
  ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev) {
  ev.preventDefault();
  var data = ev.dataTransfer.getData("text");
  ev.target.before(document.getElementById(data));
}

function openRightMenu() {
  document.getElementById("rightMenu").style.display = "block";
}

function closeRightMenu() {
  document.getElementById("rightMenu").style.display = "none";
}
</script>


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
                <div id="user-modal">
                  <a href="#"><img width="33px" src="image/ava1.png"></a>
                </div>
                <div id="user-modal">
                  <a href="#"><img width="33px" src="image/ava1.png"></a>
                </div>
                <div id="user-modal">
                  <a href="#"><img width="33px" src="image/ava1.png"></a>
                </div>
                <div class="addmem">

                  <div class="dropdown">
                    <button type="button" class="btn btn-outline-info btn-sm"  id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-plus-sign"></span></button>

                    <div class="dropdown-menu dropdown2" aria-labelledby="dropdownMenu2">
                            <h4 class="modal-title dropdown-item">Add friend</h4>
                            <hr>
                            <input class="form-control dropdown-item"  type="text" placeholder="email address or name " autofocus>

                            <div class="searchmem">
                              <a href="#" class="w3-bar-item w3-button ">
                                <div class="listfriend mem">
                                  <img src="image/ava1.png" width="30px" alt="">
                                  <span class="friendname">friend name </span>
                                </div>
                              </a>
                              <a href="#" class="w3-bar-item w3-button ">
                                <div class="listfriend mem">
                                  <img src="image/ava1.png" width="30px" alt="">
                                  <span class="friendname">friend name </span>
                                </div>
                              </a>
                              <a href="#" class="w3-bar-item w3-button ">
                                <div class="listfriend mem">
                                  <img src="image/ava1.png" width="30px" alt="">
                                  <span class="friendname">friend name </span>
                                </div>
                              </a>
                              <a href="#" class="w3-bar-item w3-button ">
                                <div class="listfriend mem">
                                  <img src="image/ava1.png" width="30px" alt="">
                                  <span class="friendname">friend name </span>
                                </div>
                              </a>
                              <a href="#" class="w3-bar-item w3-button ">
                                <div class="listfriend mem">
                                  <img src="image/ava1.png" width="30px" alt="">
                                  <span class="friendname">friend name </span>
                                </div>
                              </a>

                            </div>
                            <hr>
                            <button type="button dropdown-item" class="btn btn-default dropbtn" data-dismiss="dropdown">Close</button>
                            <button type="button dropdown-item" class="btn btn-default dropbtn" >Send invitation</button>

                          </div>
                    </div>




                  </div>
              </div>
              <div class="main-description">
                <h4><span class="	glyphicon glyphicon-align-justify"></span> Description </h4>

                <!-- <form name="formDescription" > -->
                  <div id="adddescription">
                  <div id="locationdes"></div>
                  <div  class="description" id="description"  onclick="showdesform()">Describe yourself here...</div>
                </div>
                  <!-- </form> -->

                  <!-- <textarea class="description" placeholder="Describe yourself here..."> </textarea> -->
                <!-- <div class="modal-activity"></div>  ----bỏ -->
              </div>
              <div class="check-list">
                 <h4><span class="	glyphicon glyphicon-check"></span> Checklist</h4>
                 <div class="list-checkbox">
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
                <div class="locationcheck"> </div>
                <div class="add-check" id="addcheck">
                     <button class="btn add-checklist"  onclick="showinputcheck()">add checklist</button>
                </div>
              </div>

              </div>
              <div class="deadline">
                <h4><span class="glyphicon glyphicon-time"  ></span>Deadline: <input type="date" id="deadline" value="2020-02-26"> </h4>
                  <!-- <div  class="btn changedate " onclick="changedate()">Change</div> -->
                  <!-- <label for="deadline">Deadline: </label> -->

              </div>
              <div class="file">
                <h4><span class="	glyphicon glyphicon-folder-open"  ></span>File:</h4>

               <input type="file" id="myfile" class="inputfile"  multiple>
               <button class="btn btn-secondary" type="button" onclick="uploadfile()">Upload</button>

              </div>
          </div>

        </div>
        <!-- end body modal-->

      </div>
    </div>
  </div>

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


  <script>

    function uploadfile(){
      var name = $('#myfile').val();
      $('#myfile').before('<a  class="filename" id="" href="#" >'+ name+'</a>');


    }
    function changedate(){
         $('.placedate').before('<input type="date" id="deadline" name="birthday">');
    }

    function addchecklist(){
      var x= $('#inputcheck').val();
      $('.locationcheck').before(' <label class="container">' +x
                 +' <input type="checkbox">'
                 + '<span class="checkmark"></span>'
                +'</label>');

                $('.locationcheck').html('');
                $('#addcheck').html('<button class="btn add-checklist"  onclick="showinputcheck()">add checklist</button>');

    }


    function showinputcheck(){
      $('.locationcheck').append('<input class="form-control addcard" id="inputcheck"  type="text"  placeholder="Enter name of check list">'
         + '<button type="button" class="btn btn-success" onclick="addchecklist()"">Add Checklist</button>'
          +'<button type="button" class="btn btn-success" onclick=\"CloselCheck()\">Close</button>')
          $('#addcheck').html('');
    }
    function CloselCheck(){
      $('.locationcheck').html('');
      $('#addcheck').html('<button class="btn add-checklist"  onclick="showinputcheck()">add checklist</button>');
    }

    function addcard() {
    // var x = document.getElementById("nameProject").value;
    // var div = document.createElement('div');
    // div.innerHTML = x;


    // div.setAttribute('class', 'item');
    // document.getElementById("ad").appendChild(div);;
    var x= $('#inputcard').val();

    $('.list-add').before('<div class="list-item" id="drag10" ondrop="drop(event)" ondragover="allowDrop(event)" draggable="true" ondragstart="drag(event)">'
           + '<a href="" id="newcard"  data-toggle="modal" data-target="#modal2">'+x+
                '</a>'
            +'</div>')

         $('#locationadd').html('');
    }

    function addlist() {
    var x= $('#inputlist').val();

    $('.add-list').before(  '<a href="" id="newcard">'
         +' <div class="list-item">'
                  +x+
         ' </div></a>')

         $('#locationlist').html('');
    }
    function adddescription(){
      var x= $('#inputdes').val();
      $('#inputdes').val("");
    //  $('#locationdes').before('<a  class="description" id="description" href="#" onclick="showdesform()">'
    //  +x+'</a>')//
     $('#locationdes').html('');

    $('#description').css('display', 'block');
    $('#description').html(x);



     }
    function Closedes(){
     var des= $('#description').html();
     $('#locationdes').html('');

     $('#description').css('display', 'block');
     $('#description').html(des);
    }
    $(function(){
         $("#addClass").click(function () {
          $('#qnimate').addClass('popup-box-on');
            });

            $("#removeClass").click(function () {
          $('#qnimate').removeClass('popup-box-on');
            });
  })
  </script>

  <!-- chat script  -->
<script>
  $(function() {
    var INDEX = 0;
    $("#chat-submit").click(function(e) {
      e.preventDefault();
      var msg = $("#chat-input").val();
      if(msg.trim() == ''){
        return false;
      }
      generate_message(msg, 'self');
      var buttons = [
          {
            name: 'Existing User',
            value: 'existing'
          },
          {
            name: 'New User',
            value: 'new'
          }
        ];
      setTimeout(function() {
        generate_message(msg, 'user');
      }, 1000)

    })


    function generate_message(msg, type) {
      INDEX++;
      var str="";
      str += "<div id='cm-msg-"+INDEX+"' class=\"chat-msg "+type+"\">";
      str += "          <span class=\"msg-avatar\">";
      str += "            <img src='image/ava1.png'>";
      str += "          <\/span>";
      str += "          <div class=\"cm-msg-text\">";
      str += msg;
      str += "          <\/div>";
      str += "        <\/div>";
      $(".chat-logs").append(str);
      $("#cm-msg-"+INDEX).hide().fadeIn(300);
      if(type == 'self'){
       $("#chat-input").val('');
      }
      $(".chat-logs").stop().animate({ scrollTop: $(".chat-logs")[0].scrollHeight}, 1000);
    }


    function generate_button_message(msg, buttons){
      /* Buttons should be object array
        [
          {
            name: 'Existing User',
            value: 'existing'
          },
          {
            name: 'New User',
            value: 'new'
          }
        ]
      */
      INDEX++;
      var btn_obj = buttons.map(function(button) {
         return  "<li class=\"button\"><a href=\"javascript:;\" class=\"btn btn-primary chat-btn\" chat-value=\""+button.value+"\">"+button.name+"<\/a><\/li>";
      }).join('');
      var str="";
      str += "<div id='cm-msg-"+INDEX+"' class=\"chat-msg user\">";
      str += "          <span class=\"msg-avatar\">";
      str += "            <img src='image/ava1.png'>";
      str += "          <\/span>";
      str += "          <div class=\"cm-msg-text\">";
      str += msg;
      str += "          <\/div>";
      str += "          <div class=\"cm-msg-button\">";
      str += "            <ul>";
      str += btn_obj;
      str += "            <\/ul>";
      str += "          <\/div>";
      str += "        <\/div>";
      $(".chat-logs").append(str);
      $("#cm-msg-"+INDEX).hide().fadeIn(300);
      $(".chat-logs").stop().animate({ scrollTop: $(".chat-logs")[0].scrollHeight}, 1000);
      $("#chat-input").attr("disabled", true);
    }


    $(document).delegate(".chat-btn", "click", function() {
      var value = $(this).attr("chat-value");
      var name = $(this).html();
      $("#chat-input").attr("disabled", false);
      generate_message(name, 'self');
    })


    $("#chat-circle").click(function() {
      $("#chat-circle").toggle('scale');
      $(".chat-box").toggle('scale');
    })


    $(".chat-box-toggle").click(function() {
      $("#chat-circle").toggle('scale');
      $(".chat-box").toggle('scale');
    })

  })
</script>
<!-- end chat script -->
</body>
</html>
