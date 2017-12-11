var app = require('express')();
var server = require('http').Server(app);
var io = require('socket.io')(server);
var redis = require('redis');
var port = 8890;
server.listen(port, function () {
});

io.on('connection', function (socket) {
    var redisClient = redis.createClient();
    redisClient.subscribe('message');

    redisClient.on("message", function(channel, data) {
        socket.emit(channel, data);
    });

    socket.on('i typing', function(){
        socket.broadcast.emit("typing");
    })

    socket.on('i stop typing', function(){
        socket.broadcast.emit("stop typing");
    })

    socket.on('disconnect', function() {
        redisClient.quit();
    });
});
