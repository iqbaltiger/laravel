<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
    
    
     public function Login(Request $request) {

         $messages = [
                        'email.required'=>'Please Enter Email Address.',
                        'password.required'=>'Please enter your password'    
            
                  ];
        $rules = [ 
                    'email' => 'required|email|max:255',
                     'password' => 'required|min:6',
                   ];
        
       
        
        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){
            
             return Redirect::to('/login')->withErrors($validator)->withInput();
        }
        
        
        $credentials = ['email' => $request->input('email'), 'password' => $request->input('password'),'confirmed' => 1,'user_type'=>$request->input('userType')];

        if (!Auth::attempt($credentials)) {

           
             return redirect()->back();
        } else {

            
            return redirect('/profile');
        }
    }
    
    
}
