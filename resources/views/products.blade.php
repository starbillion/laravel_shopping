@extends('layouts.header')
@section('content')
<div class="modal-dialog login animated">
    <div class="modal-content">
        <div class="modal-header">
               <a href="{{ URL::route('home') }}" class="close" data-dismiss="modal" aria-hidden="true">&times;</a>
            <h4 class="modal-title">Login with</h4>
            <img src="{{URL:: asset('images/logo.png')}}" width=150px height=100px margin-left="20px"; alt=""> 
        </div>
        <div class="modal-body">  
            <div class="box">
                <div class="social">
                    <a class="circle github" href="/auth/github">
                        <i class="fa fa-github fa-fw"></i>
                    </a>
                    <a id="google_login" class="circle google" href="/auth/google_oauth2">
                        <i class="fa fa-google-plus fa-fw"></i>
                    </a>
                    <a id="facebook_login" class="circle facebook" href="/auth/facebook">
                        <i class="fa fa-facebook fa-fw"></i>
                    </a>
                </div>
                <div class="division">
                    <div class="line l"></div>
                    <span>or</span>
                    <div class="line r"></div>
                </div>
                <div class="error"></div>
                <div class="form loginBox">
                    <form method="post" action="{{ URL::route('sign-in-post') }}" role="form"> 

                        <div class="form-group">
                            <label for="inputEmail">Email:</label>
                            <input type="email" class="form-control" id="inputEmail" placeholder="me@myemail.com" name="email"{{ Input::old('email') ? ' value='. e(Input::old('email'))  : '' }} />
                        </div>

                        <div class="form-group">
                            <label for="inputPassword">Password:</label>
                            <input type="password" class="form-control" id="inputPassword" name="password" />
                        </div>

                        <input class="btn btn-default btn-login" type="submit" value="Login" >


                        {{ Form::token() }}

                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <div class="forgot login-footer">
                    <span>
                        <a href="{{ URL::route('forgot-password') }}"><button type="button" class="btn btn-link">Forgot password?</button></a>
                    </span>
                </div>
            </div>
        </div>

        @stop