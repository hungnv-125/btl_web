$.ajaxSetup({
  headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
});

function showaddcard(id) {
    var data = "<input class='form-control addcard' id='inputcard'  type='text'  placeholder='Enter a title for this card'>"
            + "<button type='button' class='btn btn-success' onclick='addcard("+id+")'>Add Card</button>"
            +"<button type='button' class='btn btn-success' onclick=\"Closelocation("+id+")\">Close</button> ";

    document.getElementById('locationadd-'+id).innerHTML = data;

}
function Closelocation(id){
  $('#locationadd-'+id).html('');
}



function showdesform(id) {
var des = $('#description').html();
    var data = "<textarea class='input-des' id='inputdes' placeholder='Describe yourself here...'>"+des+" </textarea>"
            + "<button type='buton' class='btn btn-success btn-save' onclick='adddescription("+id+")' >Save</button>"
            +"<button type='button' class='btn btn-success' onclick='Closedes()'>Close</button> ";

    document.getElementById('locationdes').innerHTML = data;

    var x = document.getElementById("description");
    // x.html('');
    x.style.display ="none";
}


function allowDrop(ev) {
ev.preventDefault();
}

var id_drag;

function drag(ev) {
ev.dataTransfer.setData("html", ev.target.id);
id_drag =  ev.target.id;
}

function drop(ev) {
  
      ev.preventDefault();
      var data = ev.dataTransfer.getData("html");
      

      var id_tmp = ev.target.id; // id cua thang drop vao
      if(ev.target.id == ''){
          ev.target.parentElement.before(document.getElementById(data));
          id_tmp = ev.target.parentElement.id;
      }
      else
          ev.target.before(document.getElementById(data));    

      // alert(ev.target.parentElement.id);
      
      // alert($('#'+ id_tmp).parent().attr('id'));
      $.ajax({
        type:'POST',
        url: 'moveCard',
        data:{
          id_drag : id_drag.slice(4),
          id_drop : id_tmp,
          id_list : $('#'+ id_tmp).parent().attr('id').slice(5),
         _token: "{{csrf_token()}}"
        },
        success: function(res) {
          
        }
      });

      var obj={
        room : 'room-' + $('.name').attr('id'),
        id_drag : id_drag,
        id_drop : id_tmp,
        id_list : $('#'+ id_tmp).parent().attr('id')
      }

      // alert(obj.room + obj.id_drag + obj.id_drop + obj.id_list);
      socket.emit('moveCard', obj);

}


  function changedate(){
       $('.placedate').before('<input type="date" id="deadline" name="birthday">');
  }

  function addchecklist(){
    var x= $('#inputcheck').val();
    var id_card = $('.modal-card').attr('id').slice(11); 

    $('#list_work').append(' <label class="container">' +x
    +' <input type="checkbox" class="new-work">'
    + '<span class="checkmark"></span>'
   +'</label>');

    $('.locationcheck').html('');
    $('#addcheck').html('<button class="btn add-checklist"  onclick="showinputcheck()">add checklist</button>');

    
    $.ajax({
      type:'POST',
      url: 'checkList',
      data:{
        type : 'add',
       id_card : id_card,
       name_work : x,
       _token: "{{csrf_token()}}"
      },
      success: function(res) {
        $('.new-work').attr('onclick', 'updateCheckList(' + res +')');
        $('.new-work').attr('id', 'work-'+res);

        var data={
          room : 'room-' + $('.name').attr('id'),
          id_card : id_card,
          id_work : res,
          content : x
        }
        socket.emit('addchecklist',data);
        $('.new-work').removeClass('new-work');
      }
       });


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

  function addcard(id) {


  var x= $('#inputcard').val();
  
  var now = new Date();
  var nowString = ' '+now.getFullYear() +'-';
  if(now.getMonth() < 10)
    nowString += '0'+ now.getMonth();
  else 
    nowString += now.getMonth();
    
  if(now.getDate() < 10)
    nowString += '-0'+now.getDate();
  else  
    nowString += '-' + now.getDate();    

  $('.list-add-'+id).before('<div class="list-item newcard"  ondrop="drop(event)" ondragover="allowDrop(event)"'

      +' draggable="true" ondragstart="drag(event)">'
      // +' <a href="" data-toggle="modal" data-target="#modal2"> '
          + x
        //  +' </a>'
        +'<div class="duetime"><span class="glyphicon glyphicon-time"></span>'
             +nowString
            +'</div>'
      +' </div>');

       $('#locationadd-'+id).html('');

       $.ajax({
        type:'POST',
        url: 'addCard',
        data:{
         id_list : id,
         card_name : x,
         deadline : nowString,
         _token: "{{csrf_token()}}"
        },
        success: function(res) {
          $('.newcard').attr('id', 'drag-'+res);
          $('.newcard').attr('onclick', 'showModal('+res+')');

        
          var room = 'room-' + $('.name').attr('id');
          var data={
            room : room,
            id_card : $('.newcard').attr('id'),
            id_list : 'list-add-'+id,
            content : x
          }
          socket.emit('addcard', data);

          $('.newcard').removeClass("newcard");
        }
         });
  }

  function addlists(id) {
  var x= $('#inputlist').val();
  

  $('.add-list').before(  '    <div class="list" id="list-" >'

    +'<div class="list-name">'
    +' <span class="name-work">'+x+'</span>'
    +'  <div class="dropdown setting">'
    +'     <button class="btn  btn-outline-secondary btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'
    +'          <span class="	glyphicon glyphicon-cog"></span>'
    +'      </button>'
    +'      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">'
    +'          <button class="dropdown-item" type="button">Add Card</button>'
    +'          <button class="dropdown-item" type="button">Copy List</button>'
    +'          <button class="dropdown-item" type="button">Move List</button>'
    +'      </div>'
    +'    </div>'

    +'</div>'

    +'<div class="list-add-"  ondrop="drop(event)" ondragover="allowDrop(event)">'
    +'  <div id="locationadd-"></div>'
    +'  <button type="button" class="btn btn-outline-secondary btn-block" onclick="showaddcard()">+ Add Another Card</button>'
    +'</div>'

    +'</div>')

       $('#locationlist').html('');
       $('#addlist').css('display', 'block');

       $.ajax({
        type:'POST',
        url: 'addList',
        data:{
         id_list : id,
         list_name : x,
         _token: "{{csrf_token()}}"
        },
        success: function(res) {
          // $('.newcard').attr('id', 'drag-'+res);
          // $('.newcard').removeClass("newcard");
          $('.list-add-').addClass('list-add-'+ res);
          $('.list-add-').attr('id', 'list-add-'+ res)
          $('.list-add-').removeClass('list-add-');

          $('#list-').attr('id', 'list-'+res);
          $('#locationadd-').attr('id', 'locationadd-'+res);
          $('#locationadd-').removeAttr('id', 'locationadd-');

          var data = {
              room : 'room-' + $('.name').attr('id'),
              id_list : res,
              html : $('#list-'+res).html()
          }

          socket.emit('addList', data);
        }
         }); 
  }

  function showaddlist(id) {
    var data = "<input class='form-control addcard' id='inputlist'  type='text' placeholder='Enter a title for this list'>"
            + "<button type='button' class='btn btn-success' onclick=\"addlists("+id+")\" >Add List</button>";
    document.getElementById('locationlist').innerHTML = data;
    var x = document.getElementById("addlist");
        x.style.display ="none";
    }
  function adddescription(id){
      var x= $('#inputdes').val();

      $.ajax({
          type:'POST',
          url: 'description',
          data:{
          id_card : id,  
          des : x,
          _token: "{{csrf_token()}}"
          },
          success: function(res) {
            
            var data = {
              room : 'room-' + $('.name').attr('id'),
              id_card : id,
              content : x
            }
             socket.emit('adddes', data)
          }
        });

      $('#inputdes').val("");
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

  function updateCheckList(id){
    var attr = $('#work-'+ id).attr('checked');
    var status = 1;
    if (typeof attr !== typeof undefined && attr !== false) {
      status = 0;
      $('#work-'+ id).removeAttr('checked');
    }
    else{
      $('#work-'+ id).attr('checked', 'checked');
    }
    
    var data ={
      room : 'room-' + $('.name').attr('id'),
      id_work : id,
      status : status
    }
    socket.emit('updateCheckList', data)
    $.ajax({
      type:'POST',
      url: 'checkList',
      data:{
      type : 'update',
      id_work : id,  
      status : status,
      _token: "{{csrf_token()}}"
      },
      success: function(res) {
         
      }
    });
  }


  function searchUser(){
    var mail = $('#add-member').val();
    if(mail !== ''){
      $.ajax({
        type:'POST',
        url: 'searchUser',
        data:{
        mail: mail,
        _token: "{{csrf_token()}}"
        },
        success: function(res) {
            var json= JSON.parse(res);
            $('.searchmem').html('');
            for(var i =0; i < json.users.length; i++){
              var name = json.users[i].name;
              $('.searchmem').append(' <div style="cursor : pointer;" class="w3-bar-item w3-button" onclick="addMember(\''+json.users[i].name+'\',' +json.users[i].id+')">'
            +'    <div class="listfriend mem">'
            +'      <img src="'+json.users[i].image+'" width="30px" alt="">'
            +'      <span class="friendname">'+json.users[i].name+' </span>'
            +'    </div>'  
            +'  </div> <br>');
              
            }
        }
      });
    }
    else{
      $('.searchmem').html('');
    }
  }

  var arr_search = new Array();
  function addMember(name, id){
    $('.friend-choose').append(' <li class="friend-i" id="friend-'+id+'">'+name 
    +'<button type="buton" styel="width:15px; height :20px;" class="btn btn-outline-secondary" onclick="deleteSearch('+id+')">X</button>'
    +'</li>')

    arr_search.push(id);
    $('#add-member').val('');
    $('.searchmem').html('');
    }

  function confirmAddMember(){
    if(arr_search.length > 0){
      $.ajax({
        type:'POST',
        url: 'confirmAddMember',
        data:{
        id_users : arr_search.toString(),
        id_prj : $('.name').attr('id'),
        name_prj : $('.name').html(),
        _token: "{{csrf_token()}}"
        },
        success: function(res) {
            var json = JSON.parse(res);
            // alert(res);
            for(var i = 0; i <json.user.length; i++){
              $('.member').append('<div class="mem">'
              +'<img width="30px" src="'+json.user[i].image+'" title="'+json.user[i].name+'">'
              +'</div>')

              data={
                id : json.user[i].id,
                content : 'Bạn vừa được thêm vào dự án <u>'+ $('.name').html()+'</u>'
              }
              // alert(data.id);
              socket.emit('notification', data);
            }

            arr_search = new Array();
            $('.dropdown2').hide();

          
         }
      });
  }
  }  

  function deleteSearch(id){
      $('#friend-'+id).remove();
      for(var i = 0; i < arr_search.length; i++){
        if(arr_search[i] === id){
          arr_search.splice(i, 1);
          break;
        }
      }
  }  
  function closeSearch(){
    $('.dropdown2').hide();

  }

  function showSearch(){
    $('.friend-choose').html('');
    $('.searchmem').html('');
    $('#add-member').val('');
    $('.dropdown2').show();
  }

  
function hideNotifi(){
  // if($('.notifi').css('display') == 'inline-block'){
    $('.notifi').html('0');
    $('.notifi').css('display', 'none');
  // }

  // if($('#dropdown-notifi').css('display') == 'none'){
    $('#dropdown-notifi').html('<li class="drop-header">Notifications</li>'
                                +'<li class="divider"></li>');
    
    
            $.ajax({
              type:'POST',
              url: 'getNotifi',
              data:{
              id_user : $('#user').attr('class').slice(5),
              _token: "{{csrf_token()}}"
              },
              success: function(res) {
                // alert(res);
                  var json = JSON.parse(res);
                  var i;

                   for(i = 0; i < json.notifies.length; i++){
                    $('#dropdown-notifi').append('<li class="drop-list">'+json.notifies[i].content+'</li>');
                   }
                }
            });

  // }
    
  
}

function getMemberCard(){
    var id_prj = $('.name').attr('id');
    var id_card = $('.modal-card').attr('id').slice(11);

    $.ajax({
      type:'POST',
      url: 'getMemberCard',
      data:{
      id_prj : id_prj,
      id_card : id_card,
      _token: "{{csrf_token()}}"
      },
      success: function(res) {
        $('.searchmem-card').html('');
        var json = JSON.parse(res);

        var i,j;
        for(i =0; i< json.user_prj.length; i++){
            $('.searchmem-card').append('<a href="#" class="w3-bar-item w3-button ">'
                +'<div class="mem">'
                +' <img src="'+json.user_prj[i].image+'" width="30px" alt="">'
                +' <span class="friendname">'+json.user_prj[i].name+'</span>'
                +'</div>'
                +'<div class="joined">'
                +'  <input type="checkbox" id="mem-card-'+json.user_prj[i].id+'" onclick="updateMemberCard('+json.user_prj[i].id+')">'
                +'  <span class="checkjoin"></span>'
                +'</div>'
                +' </a>');

            for(j = 0; j < json.user_card.length; j++){
              if(json.user_prj[i].id == json.user_card[j].id){
                $('#mem-card-'+json.user_prj[i].id).attr('checked', 'checked');
              }
            }    
        }
      } 
    });
}

function updateMemberCard(id_user){
  var  id_card = $('.modal-card').attr('id').slice(11);

  var attr = $('#mem-card-'+ id_user).attr('checked');
  var status = 1;
  if (typeof attr !== typeof undefined && attr !== false) {
    status = 0;
    $('#mem-card-'+ id_user).removeAttr('checked');
  }
  else{
    $('#mem-card-'+ id_user).attr('checked', 'checked');
  }

  $.ajax({
    type:'POST',
    url: 'updateMemberCard',
    data:{
    id_user : id_user,
    id_card : id_card,
    status : status,
    _token: "{{csrf_token()}}"
    },
    success: function(res) {
      
    } 
  });

  var data={
    room : 'room-' + $('.name').attr('id'),
    id_card : id_card,
    id_user : id_user,
    status : status
  }

  socket.emit('updateMemberCard', data);
}

function updateDeadline(id){
  var deadline = $('#deadline').val();
  

  $.ajax({
    type:'POST',
    url: 'updateDeadLine',
    data:{
    id_card : id,
    deadline : deadline,
    _token: "{{csrf_token()}}"
    },
    success: function(res) {
      
    } 
  });


  $('#drag'+id +'> div').html('<span class="glyphicon glyphicon-time"></span>'+' '+ deadline);
  var data= {
    room : 'room-' + $('.name').attr('id'),
    id_card : id,
    deadline : deadline
  }

  socket.emit('updateDeadline', data);
}