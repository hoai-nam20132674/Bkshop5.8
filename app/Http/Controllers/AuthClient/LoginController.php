<?php

namespace App\Http\Controllers\AuthClient;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Requests\loginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    protected function guard(){
        return Auth::guard('users_client');
    }

    public function getLogin(){
        return view('auth_client.login');
    }

    public function postLogin(loginRequest $request){
        $login =array(
            'email'=>$request->email,
            'password'=>$request->password
        );
        if(Auth::guard('users_client')->attempt($login)){
            return redirect('/');
        }
        else{
            return redirect()->back()->with(['flash_level'=>'danger','flash_message'=>'Tài khoản hoặc mật khẩu không chính xác']);
        }
        
    }
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->flush();

        $request->session()->regenerate();

        return redirect('/');
    }
}
