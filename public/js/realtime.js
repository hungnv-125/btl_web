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
        else{
          $('.notifi-chat').html(parseInt($('.notifi-chat').text())+ 1);
          $('.notifi-chat').css('display', 'inline-block');
        }
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
      if($('.modal-card').attr('id').slice(11) == data.id_card){
        $('#list_work').append(' <label class="container">' +data.content
              +' <input type="checkbox" id="work-'+data.id_work+'" onclick="updateCheckList('+data.id_work+'">'
              + '<span class="checkmark"></span>'
            +'</label>');
      }
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

    socket.on('notification', function (data) {

      // alert(data.id +' '+ id_user);
        if(data.id == id_user){
          if($('#dropdown-notifi').css('display') == 'none'){
              $('.notifi').html(parseInt( $('.notifi').text())+1);
              $('.notifi').css('display', 'inline-block');

            }
            else{
              // $('.dropdown-notifi').append('<li class="drop-list">'+data.content+'</li>')
              // alert(data.content);
              $('#dropdown-notifi').append('<li class="drop-list">'+data.content+'</li>');
            }

        }
    })

    socket.on('updateMemberCard', function (data) {
      if($('.modal-card').attr('id').slice(11) == data.id_card){
        if(data.status)
          $('#mem-card-'+data.id_user).attr('checked', 'checked');
        else
          $('#mem-card-'+data.id_user).removeAttr('checked');
      }
    })

    socket.on('updateDeadline', function (data) {

      $('#drag'+data.id_card +'> div').html('<span class="glyphicon glyphicon-time"></span>'+ ' '+data.deadline);
      if($('.modal-card').attr('id').slice(11) == data.id_card){
        $('#deadline').val(data.deadline);
      }


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

  $('.notifi-chat').html('0');
          $('.notifi-chat').css('display', 'none');
})


$(".chat-box-toggle").click(function() {
  $("#chat-circle").toggle('scale');
  $(".chat-box").toggle('scale');
})

})