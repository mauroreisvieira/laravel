@extends('index')
@section('content')
<div class="container" ng-controller="controllerGame">
    <div class="m-t-50"></div> 
    <button ng-click="createGame(<?php echo Auth::user()->id; ?>)" class="button button-large">Start Game</button>
    <div class="m-t-50"></div> 
    <div class="row">
        <div class="large-12 medium-12 small-12">
            <div class="card">
                <div class="card-container">
                    <div id="board"> 
                        <div ng-repeat="tile in game.board track by $index">
                            <div ng-click="clickTile($index);" class="piece">
                                @{{$index}} 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="row">
        <div class="large-12 medium-12 small-12">
            <div class="card">
                <div class="card-container">
                    <h2 class="center">@{{varia}}</h2>
                </div>
            </div>
        </div>
    </div>
</div>
@stop