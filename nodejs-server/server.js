// Require HTTP module (to start server) and Socket.IO
var http = require('http');
var io = require('socket.io');
var gameMod = require('./game');
var port = 8080;

//start http
var server = http.createServer(function(req, res){});

server.listen(port);
console.log('Server listening on port ' + port);

// -------------------------------------------------
// Web Socket --------------------------------------
// -------------------------------------------------

var game = gameMod.game;

var listGames=[];


var io = io.listen(server, {
    log: false,
    agent: false,
    origins: '*:*'
        // 'transports': ['websocket', 'htmlfile', 'xhr-polling', 'jsonp-polling']
    });

io.on('connection', function(socket){ 
    console.log('Connection to client established');

    // Success!  Now listen to messages to be received
    socket.on('createGame',function(data){ 

        console.log(data);
      console.log('Client requested "createGame"' + data);    	
    	//game.gameStart();

        io.emit('refreshGame', data);
    });

    socket.on('clickTile',function(data){ 
    	console.log('Client requested "clickTile"', data);
    	//game.playMove(data.numPlayer, data.position);
        io.emit('refreshGame', data);
    });

    socket.on('disconnect',function(){
        console.log('Server has disconnected');
    });

});

