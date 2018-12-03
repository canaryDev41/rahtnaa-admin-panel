var express = require('express');
var socket = require('socket.io');
//app setup
var app = express();
var server = app.listen(3000, function () {
    console.log('listening to requests on port 3000');
});

//Socket setup
var io = socket(server);

io.on('connection', function () {
    console.log('made socket connection')
});