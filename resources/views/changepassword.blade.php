@extends('layouts.header')

@section('seo')
<title>Change Password</title>
@stop

@section('content')
<br /><h4>Change password?</h4><br />

@if(Session::has('success'))
<div class="alert alert-success">
    <strong>Success</strong> Your password has been changed successfully.
</div>
@else

@if(Session::has('error'))
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Error!</strong> Unexpected error occurred. Please try again.
</div>
@endif

@if(Session::has('warning'))
<div class="alert alert-warning">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Alert!</strong> You recently requested a new password. You may want to change your password.
</div>
@endif
@if(Session::has('login'))
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Error!</strong> Please Login.
</div>
@endif

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
                    <form method="post" action="{{ URL::route('change-password-post') }}" role="form"> 

                        <div class="form-group{{ ($errors->has('old_password')) ? ' has-error' : '' }}">
                            <label for="inputOldPassword">Current Password:</label>
                            <input type="password" class="form-control" id="inputOldPassword" name="old_password" />
                            @if($errors->has('old_password'))
                            <span class="help-block">
                                @foreach($errors->get('old_password') as $message)
                                {{ $message }} 
                                @endforeach
                                </ul></span>
                            @endif
                        </div>

                        <div class="form-group{{ ($errors->has('password') || $errors->has('password_again')) ? ' has-error' : '' }}">
                            <label for="inputPassword">Password:</label>
                            <input type="password" class="form-control" id="inputPassword" name="password" />
                            @if($errors->has('password'))
                            <span class="help-block">
                                @foreach($errors->get('password') as $message)
                                {{ $message }} 
                                @endforeach
                                </ul></span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('password_again') ? ' has-error' : '' }}">
                            <label for="inputPasswordAgain">Re-type password:</label>
                            <input type="password" class="form-control" id="inputPasswordAgain" name="password_again" />
                            @if($errors->has('password_again'))
                            <span class="help-block">
                                @foreach($errors->get('password_again') as $message)
                                {{ $message }} 
                                @endforeach
                                </ul></span>
                            @endif
                        </div>

                         <input class="btn btn-default btn-login" type="submit" value="Submit" >
                        {{ Form::token() }}

                    </form>
                </div>
            </div>

        </div>


        @endif
        @stop