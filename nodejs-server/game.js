module.exports = {
  game: {
	  	board: [0,0,0,0,0,0,0,0,0],
		gameStatus: 0,
	    gameStart: function(){
			this.board = [0,0,0,0,0,0,0,0,0];
			this.gameStatus = 1;
		},
		hasRow: function(v, a){
			return  ((a[0]==v) && (a[1]==v) && (a[2]==v)) || 
					((a[3]==v) && (a[4]==v) && (a[5]==v)) || 
					((a[6]==v) && (a[7]==v) && (a[8]==v)) || 
					((a[0]==v) && (a[3]==v) && (a[6]==v)) || 
					((a[1]==v) && (a[4]==v) && (a[7]==v)) || 
					((a[2]==v) && (a[5]==v) && (a[8]==v)) || 
					((a[0]==v) && (a[4]==v) && (a[8]==v)) || 
					((a[2]==v) && (a[4]==v) && (a[6]==v));
		},
		isBoardComplete: function(a){
			for (i=0; i<9; i++)
				if (a[i] === 0)
					return false;
			return true;	
		},
		gameEnd: function(){
			if (this.hasRow(1, this.board))
				return 11;
			if (this.hasRow(2, this.board))
				return 12;
			if (this.isBoardComplete(this.board))
				return 13;
			return 0;
		},
		playMove: function(playerNumber, position){
			if ((this.gameStatus!=1) && (this.gameStatus!=2))
				return false;		
			if ((position<0) || (position>9))
				return false;
			if ((playerNumber!=1) && (playerNumber!=2))
				return false;
			if (this.gameStatus != playerNumber)
				return false;
			if (this.board[position] === 0){
				this.board[position] = playerNumber;	
				endStatus = this.gameEnd();			
				if (endStatus === 0)
					this.gameStatus = (playerNumber == 1) ? 2 : 1;
				else
					this.gameStatus = endStatus;
				return true;
			}			
			return false;
		}
	}
};