(function(){
"use strict";	
	var module = angular.module('myApp', []); 

	module.controller('AppController', ['$scope', function($scope) {
		$scope.game= {board: [0,0,0,0,0,0,0,0,0], gameStatus:0};
		$scope.playerNumber = 1;
		$scope.endGameMessage = "";	

		console.log('connect');

		var protocol = location.protocol;
		var port = '8080';
		var url = protocol + '//' + window.location.hostname + ':' + port;

		console.log(url);

		var socket = io.connect(url, {reconnect: true});
		//var socket = io.connect('http://app4.dev:8080', {reconnect: true});

		var getEndGameMessage = function (){
			if ($scope.game.gameStatus === undefined)
				return "";
			if ($scope.game.gameStatus <= 2)
				return "";
			if ($scope.game.gameStatus == 11)
				return "Player with crosses has won!";
			else
				if ($scope.game.gameStatus == 12)
					return "Player with circles has won!";
				else
					return "There was a tie!";
		};

	   	$scope.startGame = function() {
	   		console.log('startGame');
	   		$scope.endGameMessage = '';
	   		socket.emit("startGame", '');
		};

	   	$scope.clickTile = function(idx){
	   		// Only plays on its turn
	   		if ($scope.game.gameStatus == $scope.playerNumber){
				var move = {
					position: idx,
					numPlayer: $scope.playerNumber
				};
		   		console.log('click ', move);
				socket.emit("playMove", move);	   			   			
	   		}
		};

		socket.on('refreshGame', function(data){
			console.log('RefreshGame', data);
			$scope.game = data;
			console.log($scope.game);
			$scope.endGameMessage = getEndGameMessage();
			$scope.$apply();
		});
	}]);
})();
