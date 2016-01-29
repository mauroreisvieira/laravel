<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
/*
|--------------------------------------------------------------------------
| Registration & Login Controller
|--------------------------------------------------------------------------
|
| This controller handles the registration of new users, as well as the
| authentication of existing users. By default, this controller uses
| a simple trait to add these behaviors. Why don't you explore it?
|
*/

use AuthenticatesAndRegistersUsers, ThrottlesLogins;

/**
* Create a new authentication controller instance.
*
* @return void
*/
public function __construct()
{
    $this->middleware('guest', ['except' => 'getLogout']);
}

/**
* Get a validator for an incoming registration request.
*
* @param  array  $data
* @return \Illuminate\Contracts\Validation\Validator
*/
protected function validator(array $data) {
    return Validator::make($data, [
        'name' => 'required|max:255',
        'email' => 'required|email|max:255|unique:users',
        'password' => 'required|confirmed|min:6',
        ]);
}


protected function create() {

    $name = Input::get('name');
    $email = Input::get('email');
    $password = Input::get('password');

    User::create([
        'name' => $name,     
        'email' => $email,
        'password' => bcrypt($password),
        ]);

    $credentials = array('email' => $email, 'password' => $password);

    if(Auth::attempt($credentials, true)) {
        return redirect('./dashboard');
    } else {
        return redirect('./login');
    }
} 

protected function authenticate() {

    $email = Input::get('email');
    $password = Input::get('password');
    $credentials = array('email' => $email, 'password' => $password);

    if(Auth::attempt($credentials, true)) {

        return redirect('./dashboard');
    } else {
        return redirect('./login');

    }

}

protected function logout() {
    Auth::logout();
    Session::flush();
    return redirect('./dashboard');

}


}
