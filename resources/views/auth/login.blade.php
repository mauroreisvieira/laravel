@extends('index')

@section('content')

<div class="container">
    <div class="row-space">
        <div class="large-6 medium-12 small-12">
            <div class="m-t-50"></div>
            <form method="post" action="auth/login" class="form">
                <div class="card">
                    <div class="card-header">
                        <h5>Login</h5>
                    </div>
                    <div class="card-container">
                        <div class="input-field">
                            <input name="email" type="text">
                            <legend for="username">Username</legend>
                        </div>
                        <div class="input-field">
                            <input name="password" type="password">
                            <legend for="password">Password</legend>
                        </div>
                        <button class="right button button-large" type="submit" name="action">Login </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="large-6 medium-12 small-12">
            <div class="m-t-50"></div>
            <form method="post" action="auth/register" class="form">
                <div class="card">
                    <div class="card-header">
                    <h5>Register</h5>
                    </div>
                    <div class="card-container">
                        <div class="input-field">
                            <input name="name" type="text">
                            <legend for="name">Username</legend>
                        </div>
                         <div class="input-field">
                            <input name="email" type="text">
                            <legend for="email">Email</legend>
                        </div>
                        <div class="input-field">
                            <input name="password" type="password">
                            <legend for="password">Password</legend>
                        </div>
                        <button class="right button button-large" type="submit" name="action">Register</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @stop
