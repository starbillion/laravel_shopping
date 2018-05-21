@extends('products.layouts.layout')
@section('content')
<!--header-->
<div class="container">
    <div class="header" id="home">		
        <ul class="header-in">
            <li ><a href="{{ URL::route('home') }}" > Home</a></li>
            @if(Auth::check())
            @if(Request::is('account/change-password'))
            <li><em class="btn big-login">Change Password</em></li>
            @else
            <li><a  class="btn big-login" href="{{ URL::route('change-password') }}">Change Password</a></li>
            @endif

            <li><a class="btn  big-login"  href="{{ URL::route('sign-out') }}">Sign Out</a></li>
            @else
            @if(Request::is('account/sign-in'))
            <li><em class="btn  big-login" >Sign In</em></li>
            @else
            <li><a class="btn  big-login"  href="{{ URL::route('sign-in') }}">Sign In</a></li>
            @endif

            @if(Request::is('account/sign-up'))
            <li><em class="btn  big-register">Sign Up</em></li>
            @else
            <li><a class="btn  big-register"  href="{{ URL::route('sign-up') }}">Sign Up</a></li>
            @endif
            @endif
        </ul>
        <div class="clearfix"> </div>
    </div>
    <!---->
    <div class="header-top">
        <div class="logo">
            <a href="index.html"><img src="{{URL:: asset('productassets/images/logo.png') }}" alt="" ></a>
        </div>
        <div class="header-top-on">
            <ul class="social-in">
                <li><a href="#"><i> </i></a></li>						
                <li><a href="#"><i class="ic"> </i></a></li>
                <li><a href="#"><i class="ic1"> </i></a></li>
                <li><a href="#"><i class="ic2"> </i></a></li>
                <li><a href="#"><i class="ic3"> </i></a></li>
            </ul>
        </div>
        <div class="clearfix"> </div>
    </div>
    @include('products.layouts.menus')
    <div class="page">
        <h6><a href="#">Page Title</a><b>|</b>Page description The quick, brown <span class="for">fox jumps over a lazy dog. DJs flock by when TV ax quiz prog.</span></h6>
    </div>
    <div class="content">

        <div class="col-md-9">
            @foreach($singleproduct as $key => $product)
            <div class="col-md-5 single-top">
                <ul id="etalage">
                    <li>
                        <a href="">
                            <img class="etalage_thumb_image img-responsive" src="{{URL:: asset('products/'.$product->imageurl) }}">
                            <img class="etalage_source_image img-responsive" src="{{URL:: asset('products/'.$product->imageurl) }}">
                        </a>
                    </li>
                    <li>
                        <img class="etalage_thumb_image img-responsive" src="images/s2.jpg" alt="" >
                        <img class="etalage_source_image img-responsive" src="images/s12.jpg" alt="" >
                    </li>
                    <li>
                        <img class="etalage_thumb_image img-responsive" src="images/s3.jpg" alt=""  >
                        <img class="etalage_source_image img-responsive" src="images/s13.jpg" alt="" >
                    </li>
                    <li>
                        <img class="etalage_thumb_image img-responsive" src="images/s4.jpg"  alt="" >
                        <img class="etalage_source_image img-responsive" src="images/s14.jpg" alt="" >
                    </li>
                </ul>

            </div>	
            <div class="col-md-7 single-top-in">

                <div class="single-para">
                    <h4>{{$product->description}}</h4>
                    <div class="para-grid">
                        <span  class="add-to">${{$product->price}}</span>				
                        <div class="clearfix"></div>
                    </div>
                    <h5>100 items in stock</h5>
                    <!--
                    <div class="available">
                        <h6>Available Options :</h6>
                        <ul>

                            <li>Size:<select>
                                    <option>Large</option>
                                    <option>Medium</option>
                                    <option>small</option>
                                    <option>Large</option>
                                    <option>small</option>
                                </select></li>
                            <li>Cost:
                                <select>
                                    <option>U.S.Dollar</option>
                                    <option>Euro</option>
                                </select></li>
                        </ul>
                    </div>
                    -->
                    </br>
                    <a href="{{URL::route('add-to-cart',$product->id) }}" class="btn btn-success">
                        <i class="glyphicon glyphicon-shopping-cart"></i> Add to Cart
                    </a>

                        <a href="{{ URL::route('shopping-cart') }}"  class="btn btn-success">
                            <i class="glyphicon glyphicon-shopping-cart"></i> View Cart
                        </a>
                    </div>
                    <div class="share">
                        <h4>Share Product :</h4>
                        <ul class="share_nav">
                            <li><a href="#"><img src="{{URL:: asset('productassets/images/facebook.png') }}" title="facebook"></a></li>
                            <li><a href="#"><img src="{{URL:: asset('productassets/images/twitter.png') }}" title="Twiiter"></a></li>
                            <li><a href="#"><img src="{{URL:: asset('productassets/images/rss.png') }}" title="Rss"></a></li>
                            <li><a href="#"><img src="{{URL:: asset('productassets/images/gpluse.png') }}" title="Google+"></a></li>
                        </ul>
                    </div>
                </div>

            </div>
            <div class="clearfix"> </div>
            <ul id="flexiselDemo1">
                <li><img src="{{URL:: asset('productassets/images/pi.jpg') }}" /><div class="grid-flex"><a href="#">Lorem</a><p>Rs 850</p></div></li>
                <li><img src="{{URL:: asset('productassets/images/pi1.jpg') }}" /><div class="grid-flex"><a href="#">Amet</a><p>Rs 850</p></div></li>
                <li><img src="{{URL:: asset('productassets/images/pi2.jpg') }}" /><div class="grid-flex"><a href="#">Simple</a><p>Rs 850</p></div></li>
                <li><img src="{{URL:: asset('productassets/images/pi3.jpg') }}" /><div class="grid-flex"><a href="#">Text</a><p>Rs 850</p></div></li>
                <li><img src="{{URL:: asset('productassets/images/pi4.jpg') }}" /><div class="grid-flex"><a href="#">Sit</a><p>Rs 850</p></div></li>
            </ul>
            <script type="text/javascript">
                $(window).load(function () {
                    $("#flexiselDemo1").flexisel({
                        visibleItems: 5,
                        animationSpeed: 1000,
                        autoPlay: true,
                        autoPlaySpeed: 3000,
                        pauseOnHover: true,
                        enableResponsiveBreakpoints: true,
                        responsiveBreakpoints: {
                            portrait: {
                                changePoint: 480,
                                visibleItems: 1
                            },
                            landscape: {
                                changePoint: 640,
                                visibleItems: 2
                            },
                            tablet: {
                                changePoint: 768,
                                visibleItems: 3
                            }
                        }
                    });

                });
            </script>
            <script type="text/javascript" src="{{URL:: asset('productassets/js/jquery.flexisel.js') }}"></script>
            <!---->

            <!---->
            @endforeach
        </div>
        @include('products.layouts.sidebar')
        <div class="clearfix"> </div>
    </div>
    <!---->
    <div class="footer">
        <p class="footer-class">Copyright &copy; 2017</p>
        <div class="clearfix"> </div>
    </div>
</div>

@endsection