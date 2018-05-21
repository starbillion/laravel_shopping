<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
//use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use App\Cart;
use App\Product;
use Session;

class CartController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*
      public function __construct()
      {
      $this->middleware('auth');
      }
     * 
     */
    public function getShoppingCart() {
        return view('products.cart');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addToCart(Request $request,$pid) {
        $product = Product::find($pid);

        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);
        $request->session()->put('cart', $cart);
        return Redirect()->back();
    }
    public function removeCartItem($id) {
        $cart = session('cart');
        $cart->removeItem($id);
        unset($cart->items[$id]);
        return Redirect()->back();
    }
    public function decreaseByOne(Request $request, $id){
        echo $id;
        /*
        $oldCart = session('cart');
        $oldCart->decreaseQuantity($id);
        $cart = new Cart($oldCart);
        $request->session()->put('cart', $cart);
        return Redirect()->back();
         * 
         */
    }

    public function increaseByOne(Request $request, $id){
        echo $id;
        /*
        $product = Product::findOrFail($id);
        $oldCart = session('cart');
        $oldCart->increaseQuantity($id, $product);
        $cart = new Cart($oldCart);
        $request->session()->put('cart', $cart);
        return Redirect()->back();
         * 
         */
    }

}
