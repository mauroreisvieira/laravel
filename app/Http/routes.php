<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', function () {
    return view('dashboard.dashboard');
});

Route::get('/welcome', function () {
    return view('dashboard.dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
});

Route::get('/game', function () {
    return Auth::check() ? view('game.game') : view('auth.login');
});

Route::get('/lobby', function () {
    return Auth::check() ? view('lobby') : view('auth.login');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/logout', function () {
    Auth::logout();
    Session::flush();
    return view('auth.login');
});


Route::post('auth/login', 'Auth\AuthController@authenticate');
Route::post('auth/register', 'Auth\AuthController@create');
Route::put('game/createGame', 'GameController@createGame');









