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
        @if(!session('cart'))

        <div class="checkout">
            <div class="checkout-left-basket">
                <h4>Cart Is Empty</h4>

            </div>
            <div class="checkout-right-basket animated wow slideInRight" data-wow-delay=".5s">
                <a href="{{ URL::route('product') }}"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Continue Shopping</a>
            </div>
            <div class="clearfix"> </div>
        </div>
        @endif
        @if(session('cart'))

        <!-- checkout -->
        <div class="checkout">
            <div class="container">
                <div class="checkout-right" style="margin-right: 60px;margin-left: 30px">
                    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                        <thead>
                            <tr>
                                <th style="text-align: center;" width="5%">No</th>
                                
                                <th style="text-align: center;" width="20%">Image</th>
                                <th style="text-align: center;" width="15%">Product Name</th>
                                <th style="text-align: center;" width="20%">Quentity</th>
                                <th style="text-align: center;" width="10%">Unit Price</th>
                                <th style="text-align: center;" width="10%">Total Price</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $i = 0;
                            ?>
                            
                            @foreach(session()->get('cart')->items as $product)
                            <tr>   
                                <td style="text-align: center;">{{ ++$i }}</td>
                                <td style="text-align: center;">
                              <img style="display: block;" src="{{URL:: asset('products/'.$product['item']['imageurl'])}}" title="{{$product['item']['name']}}" width="200px" height="190px">      
                                </td>
                                <td style="text-align: center;">{{$product['item']['name']}}</td>
                                <td style="text-align: center;">
                                    <div class="quantity">
                                        <div class="quantity-select">
                                            <i class="glyphicon glyphicon-minus minus{{$i}}" style="cursor: pointer"></i>
                                            <i class="btn btn-success">&nbsp;{{$product['qty']}}&nbsp;</i>
                                            <i class="glyphicon glyphicon-plus plus{{$i}}" style="cursor: pointer"></i>
                                        </div>
                                        <!--quantity-->
                                        <script>
                                            //$(document).ready(function () {
                                                $('.plus{{$i}}').on('click', function () {
                                                    
                                                    $.ajax({
                                                        url: {{ URL::route('increaseByOne',$product['item']['id']) }},
                                                        success:function (responseJson) {
                                                            alert('aaaaaaaaaa');
                                                        }
                                                    });
                                                    
                                                });
                                                $('.minus{{$i}}').on('click', function () {
                                                    $.ajax({
                                                        url: "decreaseByOne/{{$product['item']['id']}}",
                                                        success:function (responseJson) {
                                                             alert('bbbbbbbbbbb');
                                                        }
                                                    });
                                                });

                                            //});
                                        </script>
                                        <!--quantity-->
                                    </div>
                                </td>
                                <td style="text-align: center;">${{$product['item']['price']}}</td>
                                <td style="text-align: center;">
                                    ${{$product['price']}}
                                    <a class="btn btn-info" href="{{ URL::route('remove-cart-item',$product['item']['id']) }}">
                                        <i class="glyphicon glyphicon-trash"></i>
                                        Remove
                                    </a>
                                </td>              
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="checkout-left">
                    <div class="checkout-left-basket">
                        <h4>Total Amount :
                        <span id="billingValue">${{session()->get('cart')->totalPrice}}</span>
                        </h4>
                    </div>

                    <div class="checkout-right-basket animated wow slideInRight" data-wow-delay=".5s">
                        <h4><a href="{{ URL::route('product') }}"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Shop More Products</a></h4>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>
        <!-- //checkout -->

        @endif
        <div class="clearfix"> </div>
    </div>
    <!---->
    <div class="footer">
        <p class="footer-class">Copyright &copy; 2017</p>
        <div class="clearfix"> </div>
    </div>
</div>

@endsection