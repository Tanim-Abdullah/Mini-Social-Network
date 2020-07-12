<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Image;
use Illuminate\Support\Facades\Storage;

class registerController extends Controller
{
	public function index()
	{
    return view('register');
    }

    public function adduser(Request $request){
         $file="";
        if($request->hasFile('pic')){

            $file = $request->file('pic');
            $file->move('upload/', $file->getClientOriginalName());

            DB::table('users')->insert(
            ['name' => $request->usrnm,
                'email' => $request->email,
                'images' => $file->getClientOriginalName(),
                'email_verified_at' => date('d-M-Y'),
                'password' => $request->psw,
                'remember_token'=>"",
                'created_at' => date('d-M-Y'),
                'updated_at' => date('d-M-Y'),
            ]
         );
     }

        return redirect()->route('login');
    }
}
