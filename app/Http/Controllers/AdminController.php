<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
//use App\Http\models\User;
use App\User;
use Hash;
use Illuminate\Support\Facades\Redirect;
//use Illuminate\Mail\Mailer;
use Mail;
use URL;
use Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller {

    public function getAdmin() {
        if(Auth::check()){
                  return view('admin.index');  
        }
        return Redirect::route('sign-in-post');


    }

    public function getUserlist() {
        $users = DB::table('users')->get();
        //return view('admin.users',['users' => $users]);
        return view('admin.users')->with('users', $users);
    }

    public function deleteUser($id) {
        $user = User::where('id', '=', $id);
        $user->delete();
        return Redirect()->back();
    }

}
