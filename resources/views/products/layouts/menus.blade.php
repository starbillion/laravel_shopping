<div class="header-bottom">
    <div class="top-nav">

        <ul class="megamenu skyblue">
            <li class="active grid"><a  href="{{ URL::route('product') }}">Products</a>
                <div class="megapanel">
                    <div class="row">
                        <div class="col1">
                            <div class="h_nav">
                                <ul>
                                    <li><a href="store.html">Accessories</a></li>
                                    <li><a href="store.html">Bags</a></li>
                                    <li><a href="store.html">Caps & Hats</a></li>
                                    <li><a href="store.html">Hoodies & Sweatshirts</a></li>
                                    <li><a href="store.html">Jackets & Coats</a></li>
                                    <li><a href="store.html">Jeans</a></li>
                                    <li><a href="store.html">Jewellery</a></li>
                                    <li><a href="store.html">Jumpers & Cardigans</a></li>
                                    <li><a href="store.html">Leather Jackets</a></li>
                                    <li><a href="store.html">Long Sleeve T-Shirts</a></li>
                                    <li><a href="store.html">Loungewear</a></li>
                                </ul>	
                            </div>							
                        </div>
                        <div class="col1">
                            <div class="h_nav">
                                <ul>
                                    <li><a href="store.html">Shirts</a></li>
                                    <li><a href="store.html">Shoes, Boots & Trainers</a></li>
                                    <li><a href="store.html">Shorts</a></li>
                                    <li><a href="store.html">Suits & Blazers</a></li>
                                    <li><a href="store.html">Sunglasses</a></li>
                                    <li><a href="store.html">Sweatpants</a></li>
                                    <li><a href="store.html">Swimwear</a></li>
                                    <li><a href="store.html">Trousers & Chinos</a></li>
                                    <li><a href="store.html">T-Shirts</a></li>
                                    <li><a href="store.html">Underwear & Socks</a></li>
                                    <li><a href="store.html">Vests</a></li>
                                </ul>	
                            </div>							
                        </div>
                        <div class="col1">
                            <div class="h_nav">
                                <h4>Popular Brands</h4>
                                <ul>
                                    <li><a href="store.html">Levis</a></li>
                                    <li><a href="store.html">Persol</a></li>
                                    <li><a href="store.html">Nike</a></li>
                                    <li><a href="store.html">Edwin</a></li>
                                    <li><a href="store.html">New Balance</a></li>
                                    <li><a href="store.html">Jack & Jones</a></li>
                                    <li><a href="store.html">Paul Smith</a></li>
                                    <li><a href="store.html">Ray-Ban</a></li>
                                    <li><a href="store.html">Wood Wood</a></li>
                                </ul>	
                            </div>												
                        </div>
                    </div>
                </div>
            </li>

        </ul> 
    </div>

    <div class="cart icon1 sub-icon1">
        <h6 ><i class="glyphicon glyphicon-shopping-cart"></i>
            Shopping Cart:
            <span class="badge">{{Session::has('cart') ? Session::get('cart')->totalQty : 0}}</span>
            <li><a href="#" class="round"> </a>
                <ul class="sub-icon1 list">
                    <h3>Recently added items({{Session::has('cart') ? Session::get('cart')->totalQty : 0}})</h3>
                    @if(session('cart'))
                    @foreach(session()->get('cart')->items as $product)
                    <div class="shopping_cart">
                        <div class="cart_box">
                            <div class="message">
                                <a href="{{ URL::route('remove-cart-item',$product['item']['id']) }}" class="alert-close"> </a> 
                                <div class="list_img">
                                    <img style="display: block;" src="{{URL:: asset('products/'.$product['item']['imageurl'])}}" title="{{$product['item']['name']}}" width="50px" height="50px">
                                    </br>
                                    ${{$product['price']}}
                                </div>
                                <div class="list_desc"><h4>{{$product['item']['name']}}</h4>

                                    <a href="#" class="offer">{{$product['qty']}} offer applied</a>

                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                    <div class="check_button">
                        <a href="{{ URL::route('shopping-cart') }}">
                            <i class="glyphicon glyphicon-shopping-cart"></i> View Cart</a>
                        </a>
                    </div>
                    <div class="clearfix"></div>
                </ul>
            </li>
        </h6>

    </div>
    <div class="clearfix"> </div>
</div>