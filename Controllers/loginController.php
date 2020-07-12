<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class loginController extends Controller
{
   
	 public function index(Request $req){
    	
    	return view('login');


    }

    public function login(Request $req){
        
         
         $user = DB::table('users')->where('name', $req->username)
            ->where('password', $req->password)
            ->first();

    	if($user){
            $req->session()->put('uname', $req->username);
    		return redirect()->route('admin-dash');
    	}else{

            $req->session()->flash('msg', "Invalid username/password");
    		return redirect('/login');
            //return view('login.index');
    	}
    }
}
