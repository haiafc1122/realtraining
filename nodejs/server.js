var app = require('express')();
var server = require('http').Server(app);
var io = require('socket.io')(server);
var redis = require('redis');
var _ = require('lodash');

var port = 8890;
server.listen(port, function () {
    console.log('server is running...');
});

io.on('connection', function (socket) {

    var redisClient = redis.createClient();

    redisClient.subscribe('message');

    redisClient.on('message', function(channel, data) {
        socket.emit(channel, data);
    });

    socket.on('register_id', function(data) {
        console.log(socket.id);
        console.log( "user id nguoi dung",data.user_id);
        socket.user_id = data.user_id;
        //console.log('registered user:' + socket.user_id);
    });

    socket.on('online', function() {
        socket.online = 1;
        //console.log('registered user is online');
    });

    socket.on('send_message', function(data) {
        var receiver = data.to;
        console.log(socket);
        var receiver_socket = _.findKey(socket.nsp.connected, { 'user_id': receiver });
        console.log("socket.id nguoi nhan: ",receiver_socket);
        socket.to(receiver_socket).emit('receive_message', { content: data.content, from: socket.user_id });

        //console.log(socket);
        var is_online = 0;

        //console.log('receiver_socket', receiver_socket);
        if (receiver_socket && socket.nsp.connected[receiver_socket] && socket.nsp.connected[receiver_socket].online) {
            is_online = socket.nsp.connected[receiver_socket].online;
        }

        if (receiver_socket && is_online == 1) {
            //console.log('send message from', data.username);
            socket.to(receiver_socket).emit('receive_message', { content: data.content, from: socket.user_id });
        } else if (receiver_socket) {
            //console.log('send notify from', data.username);
            socket.to(receiver_socket).emit('notify_new_message', { from_id: socket.user_id, from_name: data.username })
        }
    });

    socket.on('i typing', function(){
        socket.broadcast.emit("typing");
    });

    socket.on('i stop typing', function(){
        socket.broadcast.emit("stop typing");
    });

    socket.on('disconnect', function() {
        redisClient.quit();
    });
});
