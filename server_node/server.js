var io = require('socket.io')(6001)
console.log('Connected to port 6001')

var Redis = require('ioredis')
var redis = new Redis()

redis.psubscribe("*", function(error, conunt){

})

io.on('error', function(socket){
    console.log('error')
    
})


io.on('connection', function(socket){
    console.log('Co nguoi ket ngoi '+ socket.id)  
    // io.emit('chat', "connection")

    socket.on('disconnect', function() {
        console.log('Ngat ket ngoi '+ socket.id)
     });
    socket.on('room', function(room){
        console.log(room);
        socket.join(room);
    })

    socket.on('chat', function(data){
        
        socket.to(data.room).emit('chat', data);
    })

    socket.on('addcard', function (data){
        socket.to(data.room).emit('addcard', data);
    })

    socket.on('adddes', function (data){
        socket.to(data.room).emit('adddes', data);
    })

    socket.on('updateCheckList', function (data){
        socket.to(data.room).emit('updateCheckList', data);
    })

    socket.on('addchecklist', function (data){
        socket.to(data.room).emit('addchecklist', data);
    })

    socket.on('uploadfile', function (data){
        socket.to(data.room).emit('uploadfile', data);
    })

    socket.on('moveCard', function(data){
        socket.to(data.room).emit('moveCard', data);
    })

    socket.on('addList', function(data){
        socket.to(data.room).emit('addList', data);
    })
    socket.on('updateMemberCard', function(data){
        socket.to(data.room).emit('updateMemberCard', data);
    })
    socket.on('notification', function(data){
        io.emit('notification', data);
    })
    socket.on('updateDeadline', function(data){
        socket.to(data.room).emit('updateDeadline', data);
    })
})



redis.on('pmessage', function(partner, channel, message){
    // console.log(message);
    // io.emit(channel+":"+mess.event, )
    message = JSON.parse(message)
    io.emit('chat', message.data.message)
    // console.log('sent')
}) 

