@extends('products.layouts.layout')
@section('content')
<!--header-->
<div class="container">
    <div class="header" id="home">
        <ul class="header-in">
            <li ><a href="{{ URL::route('home') }}" > Home</a></li>
            @if(Auth::check())
            {{--@if(Request::is('account/change-password'))--}}
            {{--<li><em class="btn big-login">Change Password</em></li>--}}
            {{--@else--}}
            {{--<li><a  class="btn big-login" href="{{ URL::route('change-password') }}">Change Password</a></li>--}}
            {{--@endif--}}

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
    This is product page.
    <!---->
    {{--<div class="header-top">--}}
        {{--<div class="logo">--}}
            {{--<a href="index.html"><img src="{{URL:: asset('productassets/images/logo.png') }}"></a>--}}
        {{--</div>--}}
        {{--<div class="header-top-on">--}}
            {{--<ul class="social-in">--}}
                {{--<li><a href="#"><i> </i></a></li>						--}}
                {{--<li><a href="#"><i class="ic"> </i></a></li>--}}
                {{--<li><a href="#"><i class="ic1"> </i></a></li>--}}
                {{--<li><a href="#"><i class="ic2"> </i></a></li>--}}
                {{--<li><a href="#"><i class="ic3"> </i></a></li>--}}
            {{--</ul>--}}
        {{--</div>--}}
        {{--<div class="clearfix"> </div>--}}
    {{--</div>--}}
    {{--@include('products.layouts.menus')--}}
    {{--<div class="page">--}}
        {{--<h6><a href="#">Page Title</a><b>|</b>Page description The quick, brown <span class="for">fox jumps over a lazy dog. DJs flock by when TV ax quiz prog.</span></h6>--}}
    {{--</div>--}}
    {{--<div class="content">--}}

        {{--<div class="col-md-9">--}}


            {{--<div class="shoe">--}}
                {{--<img class="img-responsive" src="{{URL:: asset('productassets/images/banner.jpg')}}" alt="" >--}}
            {{--</div>--}}
            {{--<!-- /SLIDER -->--}}
            {{--<div class="content-bottom">--}}
                {{--<h3>Featured products</h3>--}}
                {{--@foreach($products->chunk(3) as $productChuck)--}}
                {{--<div class="row">--}}
                    {{--@foreach($productChuck as $key => $product)--}}
                    {{--<div class="col-md-4">--}}
                        {{--<div class="bottom-grid-top" style="margin-bottom: 10px">--}}
                            {{--<a href="{{ URL::route('single-product',$product->id) }}">--}}
                                {{--<img style="display: block;" src="{{URL:: asset('products/'.$product->imageurl)}}" title="{{$product->name}}" width="200px" height="190px">--}}
                                {{--<div class="five">--}}
                                    {{--<h6 >-20%</h6>--}}
                                {{--</div>--}}
                                {{--<div class="pre">--}}
                                    {{--<p>{{$product->name}}</p>--}}
                                    {{--<span>${{$product->price}}</span>--}}
                                    {{--<div class="clearfix"> </div>--}}
                                {{--</div>--}}
                            {{--</a>--}}


                        {{--</div>--}}
                    {{--</div>--}}
                    {{--@endforeach--}}
                    {{--<div class="clearfix"> </div>--}}
                {{--</div>--}}
                {{--@endforeach--}}
            {{--</div>--}}
            {{--<ul class="start">--}}
                {{--<li><span>1</span></li>--}}
                {{--<li class="arrow"><a href="#">2</a></li>--}}
                {{--<li class="arrow"><a href="#">3</a></li>--}}
                {{--<li class="arrow"><a href="#">4</a></li>--}}
                {{--<li class="arrow"><a href="#">5</a></li>--}}
                {{--<li class="arrow"><a href="#">6</a></li>--}}
            {{--</ul>--}}
        {{--</div>--}}
        {{--@include('products.layouts.sidebar')--}}
        {{--<div class="clearfix"> </div>--}}
    {{--</div>--}}
    <!---->
    <div class="footer">
        <p class="footer-class">Copyright &copy; 2017.</p>
        <div class="clearfix"> </div>
    </div>	 	
</div>
<!---->
@endsection