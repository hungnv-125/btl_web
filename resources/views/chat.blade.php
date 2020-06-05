<!DOCTYPE html>
<html lang="en">
<head>
<style>
 #chat{
    height: 400px;
    width: 300px;
    background-color: antiquewhite;
    margin-top: 50px;
    border-style: double;
 }

</style>
<meta name="csrf-token" content="{{ csrf_token() }}" />
<script src="{{ asset('js/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('js/bootstrap.min.js')}}"  type="text/javascript"></script>
    <script src="{{ asset('js/socket.io.js')}}"  type="text/javascript"></script>

    <script>

    var socket = io('http://localhost:6001')
    socket.on('chat', function (data) {
        $('#chat').append('<div>' + data + '</div>');
        // console.log(data)
    })


    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
        });

    function send() {
        var mess = $('#mess').val();

        $.ajax({
               type:'POST',
               url: 'sendMess',
               data:{
                mess : mess,
                _token: "{{csrf_token()}}"
               },
               success: function(res) {
                    // $('#chat').append('<div>' + mess + '</div>');
                    $('#mess').val('');
               }
            });

    }
    </script>
</head>
<body>
    <input type="text" name="mess" id="mess">
    <button onclick="send()">Send</button>
    <br>
    <div id = "chat">
    </div>
</body>

</html>
