<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout'); 
    }

    public function index(){
        return view('login');
    }
     
    public function validateLogin(Request $request)
    {
        $username = $request->username;
        $password = $request->password;

        $user = DB::table('users')
            ->where('name', $username)
            ->where('password', $password)
            ->first();

        if ($user != null) {
            $request->session()->put('uname', $request->username);
            return redirect()->route('admin-dash');
        } else {
            $request->session()->flash('warning', '*Your Password is not valid, please try again*'); //flash data used for only one request and view for 2nd time
            return redirect()->route('login');
        }

        //return view('dashboard.image');
    }
}
