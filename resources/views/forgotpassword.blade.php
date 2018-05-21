<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="csrf_token" content="{{ csrf_token() }}"/>
    <title>Our Site</title>

    <!-- Main CSS file -->
    <link rel="stylesheet" href="{{URL:: asset('css/my/css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" href="{{URL:: asset('css/my/css/owl.carousel.css') }}"/>
    <link rel="stylesheet" href="{{ URL::asset('css/my/css/magnific-popup.css') }}"/>
    <link rel="stylesheet" href="{{URL:: asset('css/my/css/font-awesome.css') }}"/>
    <link rel="stylesheet" href="{{ URL::asset('css/my/css/style.css') }}"/>
    <link rel="stylesheet" href="{{URL:: asset('css/my/css/responsive.css') }}"/>


    <!-- Favicon -->
    <link rel="shortcut icon" href="{{URL:: asset('images/icon/favicon.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
          href="{{URL:: asset('images/icon/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72"
          href="{{URL:: asset('images/icon/apple-touch-icon-72-precomposedsed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114"
          href="{{URL:: asset('images/icon/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72"
          href="{{URL:: asset('images/icon/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{URL:: asset('images/icon/apple-touch-icon-57-precomposed.png')}}">

    <!--login-->
    <link href="{{URL:: asset('css/my/css/login-register.css') }}" rel="stylesheet"/>
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">

    <script src="{{URL:: asset('js/login-register.js') }}" type="text/javascript"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

<!-- PRELOADER -->
<div id="st-preloader">
    <div id="pre-status">
        <div class="preload-placeholder"></div>
    </div>
</div>
<!-- /PRELOADER -->

@if(Session::has('success'))
    <div class="alert alert-success">
        We have sent you instructions in your email in order to recover your account.
    </div>
@else

    @if(Session::has('error'))
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>Error!</strong>
            {{ (Session::get('error') == 'invalid-email') ? 'Invalid email. Please try again.' : '' }}
            @if (Session::get('error') == 'account-doesnt-exist')
                Account does not exist. Please try again or
                {{link_to_route('sign-up', 'Sign Up') }}
            @endif
            {{ (Session::get('error') == 'inactive-account') ? 'Account not active, please check your email and activate.' : '' }}
            {{ (Session::get('error') == 'unexpected-error') ? 'Unexpected error occurred. Please try again.' : '' }}
        </div>
    @endif
    <div class="modal-dialog login animated">
        <div class="modal-content">
            <div class="modal-header">
                {{--<a href="{{ URL::route('home') }}" class="close" data-dismiss="modal" aria-hidden="true">&times;</a>--}}
                <h4 class="modal-title">Forgot password</h4>
                <a class="logo" href="{{ URL::route('home') }}">
                    <img src="{{URL:: asset('images/logo.png')}}" width=150px height=100px margin-left="20px" ; alt="">
                </a>
            </div>
            <div class="modal-body">
                <div class="box">
                    {{--<div class="social">--}}
                    {{--<a class="circle github" href="/auth/github">--}}
                    {{--<i class="fa fa-github fa-fw"></i>--}}
                    {{--</a>--}}
                    {{--<a id="google_login" class="circle google" href="/auth/google_oauth2">--}}
                    {{--<i class="fa fa-google-plus fa-fw"></i>--}}
                    {{--</a>--}}
                    {{--<a id="facebook_login" class="circle facebook" href="/auth/facebook">--}}
                    {{--<i class="fa fa-facebook fa-fw"></i>--}}
                    {{--</a>--}}
                    {{--</div>--}}
                    {{--<div class="division">--}}
                    {{--<div class="line l"></div>--}}
                    {{--<span>or</span>--}}
                    {{--<div class="line r"></div>--}}
                    {{--</div>--}}
                    <div class="error"></div>
                    <div class="content registerBox">
                        <form method="post" action="{{ URL::route('forgot-password-post') }}" role="form">

                            <div class="form-group">
                                <label for="inputEmail">Email:</label>
                                <input type="email" class="form-control" id="inputEmail" placeholder="me@myemail.com"
                                       name="email"{{ Input::old('email') ? ' value="'. e(Input::old('email')) .'"' : '' }} />
                            </div>

                            <input class="btn btn-default btn-register" type="submit" value="Submit" name="commit">
                            {{ Form::token() }}

                        </form>

                    </div>
                </div>
                <div class="modal-footer">
                    <div class="forgot register-footer" style="display:none">
                        <span>Already have an account?</span>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

<script type="text/javascript" src="{{URL:: asset('js/jquery.min.js')}}"></script><!-- jQuery -->
<script type="text/javascript" src="{{URL:: asset('js/bootstrap.min.js')}}"></script><!-- Bootstrap -->
<script type="text/javascript" src="{{URL:: asset('js/jquery.parallax.js')}}"></script><!-- Parallax -->
<script type="text/javascript" src="{{URL:: asset('js/smoothscroll.js')}}"></script><!-- Smooth Scroll -->
<script type="text/javascript" src="{{URL:: asset('js/masonry.pkgd.min.js')}}"></script><!-- masonry -->
<script type="text/javascript" src="{{URL:: asset('js/jquery.fitvids.js')}}"></script><!-- fitvids -->
<script type="text/javascript" src="{{URL:: asset('js/owl.carousel.min.js')}}"></script><!-- Owl-Carousel -->
<script type="text/javascript" src="{{URL:: asset('js/jquery.counterup.min.js')}}"></script><!-- CounterUp -->
<script type="text/javascript" src="{{URL:: asset('js/waypoints.min.js')}}"></script><!-- CounterUp -->
<script type="text/javascript" src="{{URL:: asset('js/jquery.isotope.min.js')}}"></script><!-- isotope -->
<script type="text/javascript" src="{{URL:: asset('js/jquery.magnific-popup.min.js')}}"></script>
<!-- magnific-popup -->
<script type="text/javascript" src="{{URL:: asset('js/scripts.js')}}"></script><!-- Scripts -->


</body>
</html>