'use strict';

var app = angular.module('appExame', []); 

app.controller('controllerGame', function($scope, $http, $interval, $window) {

    $scope.game = { board: ['','','','','','','','','', ''], gameStatus:0 };

    $scope.ArrayNewGame = {};
    $scope.playerNumber = 1;
    $scope.endGameMessage = "";	
    $scope.gameId = "A";
    $scope.playerName = "player";

    var protocol = location.protocol;
    var port = '8080';
    var url = protocol + '//' + window.location.hostname + ':' + port;

    var socket = io.connect(url, {reconnect: true});

    $scope.createGame = function(idPlayer) {

        console.log(idPlayer);
        $scope.createGameDataUser(idPlayer);
        socket.emit("createGame", idPlayer);
    };

    $scope.clickTile = function(index) {
        socket.emit("clickTile", index);
        $scope.PecaClicada = index;
    };

    socket.on('refreshGame', function(index) {

        console.log('refreshGame '+ index);
        $scope.$apply();

    });

    $scope.createGameDataUser = function(data){

        $http({
            method: 'PUT',
            url: '/game/createGame',
            dataType: "json",
            headers: {
                "Content-Type": "application/json"
            }
            
        }).success(function(data, status, headers, config) {
            $scope.gameId = data;
        });

        socket.emit("createGame", $scope.gameId);
    };

});