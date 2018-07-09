var app=require('express')();
var http=require('http').Server(app);
var io=require('socket.io')(http);
var Redis=require('ioredis');
var redis=new Redis();
redis.psubscribe("*",function (error,count) {
    
});
redis.on('pmessage',function(partner,channel,message){

    message=JSON.parse(message);
    io.sockets.emit(channel+":"+message.event,message.data.message);

});
http.listen(6001,function () {
    console.log("Connected port 6001");
});
io.on("connection",function (socket) {
    console.log("connected"+socket.id);
});