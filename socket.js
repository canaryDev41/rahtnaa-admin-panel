var server = require('http').Server();

var io = require('socket.io')(server);

var Redis = require('ioredis');
var redis = new Redis();

redis.subscribe('orders-channel');

redis.on('message', function (channel, message) {
    console.log('Message Received');
    console.log(message);
});

server.listen(3000, function () {
    console.log('dev server is running');
});