@extends('index')
@section('content')
<div class="container">
    <div class="row">
        <div ng-repeat="tile in game track by $index">
            <div class="large-12 medium-12 small-12">
                <div class="card">
                    <div class="card-container">
                        <a href="{{ url('game') }}" class="button button-large">New Game</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
