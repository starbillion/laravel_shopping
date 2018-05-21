<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Auth;

class ProductController extends Controller {

    public function showProducts() {
        if(Auth::check()) {
//            $products = DB::table('products')->get();
//            $counts = DB::table('products')->get()->count();
//            //echo $counts;
//            return view('products.index', array('products' => $products));
            return Redirect::route('admin-index');
        }
        else{
            return Redirect::route("sign-in");
        }

    }
 public function singleProduct($id) {

        $singleproduct = Product::where('id', '=', $id)->get();
        return view('products.single-product')->with('singleproduct', $singleproduct);
    }

    public function getProducts() {

        $products = DB::table('products')->get();
        return view('admin.products')->with('products', $products);
    }

    public function addProducts() {
        return view('admin.add-products');
    }

    public function saveProduct(Request $request) {
        $valid = Validator::make(Input::all(), array(
                    'name' => 'required',
                    'description' => 'required|max:200',
                    'price' => 'required',
                    'stock' => 'required',
                    'imageurl' => 'required',
                        )
        );

        if ($valid->fails()) {
            return Redirect::route('admin-add-products')->withErrors($valid)->withInput();
        }

        $name = Input::get('name');
        $description = Input::get('description');
        $price = Input::get('price');
        $stock = Input::get('stock');
        /* begin getting the url of product image* */
        $imageurl = $request->file('imageurl');
        $input['imagename'] = time() . '.' . $imageurl->getClientOriginalExtension(); //getting name of product image
        $destinationPath = public_path('products');                                //getting url of product image
        $imageurl->move($destinationPath, $input['imagename']);
        /* end getting the url of product image* */

        $product = new Product;
        $product->name = $name;
        $product->description = $description;
        $product->price = $price;
        $product->stock = $stock;
        $product->imageurl = $input['imagename'];

        if ($product->save()) {
            return Redirect::route('admin-products');
        } else {
            return Redirect::route('admin-add-products')->with('error', 'creating New product. Please again..');
        }
    }

    public function deleteProduct($id) {
        $product = Product::where('id', '=', $id);
        $product->delete();
        return Redirect()->back();
    }

    public function editProduct($id) {
        $editproduct = Product::where('id', '=', $id)->get();
        return view('admin.edit-product')->with('editproduct', $editproduct);
    }

    public function updateProduct(Request $request) {
        $valid = Validator::make(Input::all(), array(
                    'name' => 'required',
                    'description' => 'required|max:200',
                    'price' => 'required',
                    'stock' => 'required',
                        //'imageurl' => 'required',
                        )
        );

        if ($valid->fails()) {
            return Redirect::route('admin-product-edit')->withErrors($valid)->withInput();
        }

        $id = Input::get('pid');
        $name = Input::get('name');
        $description = Input::get('description');
        $price = Input::get('price');
        $stock = Input::get('stock');

        $imageurl = $request->file('imageurl');
        if ($imageurl == '') {
            DB::table('products')
                    ->where('id', $id)
                    ->update(['name' => $name,
                        'description' => $description,
                        'price' => $price,
                        'stock' => $stock
            ]);
        } else {
            $input['imagename'] = time() . '.' . $imageurl->getClientOriginalExtension(); //getting name of product image
            $destinationPath = public_path('products');                                //getting url of product image
            $imageurl->move($destinationPath, $input['imagename']);
            DB::table('products')
                    ->where('id', $id)
                    ->update(['name' => $name,
                        'description' => $description,
                        'price' => $price,
                        'stock' => $stock,
                        'imageurl' => $input['imagename']
            ]);
        }
        return Redirect::route('admin-products');
    }

}
