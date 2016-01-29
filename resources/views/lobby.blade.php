<!doctype html>
<html>
<head>
<title>Lobby</title>
</head>
    <body>
    <?php  echo Auth::user()->name; ?>
        Lobby
        <a href="{{ url('logout') }}">logout</a>
        <a href="{{ url('newGame') }}">new game</a>
        <div ng-repeat="tile in game.id track by $index">
            <a href="{{ url('game') }}">new game</a>
        </div>
    </body>
</html>
