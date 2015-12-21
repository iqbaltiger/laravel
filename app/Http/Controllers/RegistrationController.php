<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\User;
use App\Profile;
use App\AdminProfile;
use App\Teacher;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Mail;


class RegistrationController extends Controller {

    public function store(Request $request)
    {
        
        
        $rules = [
            'name' => 'required|min:6',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
            
            
        ];
  
         $messages = [   'name.required'=>'Please Enter Your Name.',
//                        'email.email'=>'Please Enter Valid Email Address.',
                        'email.required'=>'Please Enter Email Address.',
                        'password.required'=>'Please enter your password'    
            
                  ];

        $validator = Validator::make($request->all(), $rules,$messages);

        if($validator->fails())
        {
            return Redirect::back()->withInput()->withErrors($validator);
        }

        $confirmation_code = str_random(30);

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'gender' => $request->input('gender'),
            'password' => bcrypt($request->input['password']),
            'confirmation_code' => $confirmation_code,
            'phone_number' => $request->input('phone_number'),
            'user_type'=>'student',
        ]);

//        Mail::send('email.verify', $confirmation_code, function($message) {
//            $message->to(Input::get('email'), Input::get('name'))
//                ->subject('Verify your email address');
//        });

       
        Session::flash('success', 'Thanks for signing up! Please check your email.');

       return Redirect::to('student-registration');
    }
    
    
     public function profileSave(Request $request)
    {
        $rules = [
            'state' => 'required',
            'city' => 'required',
            'locality' => 'required',
            'subject_tution' => 'required',
            'study_in' => 'required',
            'language_medium' => 'required',
            'message' => 'required|Max:200',
           
        ];
  
         $messages = [   'locality.required'=>'Please Enter Your Locality.',
                          'study_in.required'=>'Please Enter Your Study Subject.',
                     
                  ];

        $validator = Validator::make($request->all(), $rules,$messages);

        if($validator->fails())
        {
            return Redirect::back()->withInput()->withErrors($validator);
        } 
        
        else{
             
            
            Profile::create([
            'state' => $request->input('state'),
            'city' => $request->input('city'),
            'locality' => $request->input('locality'),
            'subject_tution' => $request->input('subject_tution'),
            'other_subject' => $request->input('other_subject'),
            'study_in' => $request->input('study_in'),
            'language_medium' => $request->input('language_medium'),
            'message' => $request->input('message'),    
        ]);
            
        }
        
        Session::flash('success', 'Thanks for Your Profile Registration');

       return Redirect::to('student-registration'); 
    }
    
    
    //Teacher profile Information Will be saved
    
    public function profileTeacherSave(Request $request)
    {
        $rules = [
            'state' => 'required',
            'city' => 'required',
            'locality' => 'required',
            'subject_tution' => 'required',
            'experience' => 'required',
            'language_medium' => 'required',
            'message' => 'required|Max:200',
           
        ];
  
        $messages = [ 'locality.required' => 'Please Enter Your Locality.',
                      'study_in.required' => 'Please Enter Your Study Subject.',
                      'experience.required' => 'Please Enter Your Experience years and Where.',
        ];

        $validator = Validator::make($request->all(), $rules,$messages);

        if($validator->fails())
        {
            return Redirect::back()->withInput()->withErrors($validator);
        } 
        
        else{
             
            
            Teacher::create([
            'state' => $request->input('state'),
            'city' => $request->input('city'),
            'locality' => $request->input('locality'),
            'subject_tution' => $request->input('subject_tution'),
            'other_subject' => $request->input('other_subject'),
            'experience' => $request->input('experience'),
            'language_medium' => $request->input('language_medium'),
            'message' => $request->input('message'),    
        ]);
            
        }
        
        Session::flash('success', 'Teacher Profile Saved!');

       return Redirect::to('student-registration'); 
    }
    
    
    public function storeUserType(Request $request)
    {
        $rules = [
            'name' => 'required|min:6',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
            'phone_number' => 'required',
            'age' => 'required|numeric',
            'gender' => 'required',
            
        ];
  
         $messages = [   'name.required'=>'Please Enter Your Name.',
//                        'email.email'=>'Please Enter Valid Email Address.',
                        'email.required'=>'Please Enter Email Address.',
                        'password.required'=>'Please enter your password',
                        'age.required'=>'Please enter your age',
                       'gender.required'=>'Please Check Your Gender',
                       'phone_number.required'=>'Please Enter Your Phone Number',
            
                  ];

        $validator = Validator::make($request->all(), $rules,$messages);

        if($validator->fails())
        {
            return Redirect::back()->withInput()->withErrors($validator);
        }

        $confirmation_code = str_random(30);

        //To get User Type
         $routeType = Route::getFacadeRoot()->current()->uri(); 
        if($routeType=='register/teacher'){
            $userType='teacher';
        }
        else{
            $userType='admin';
            
        }
        
        
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'gender' => $request->input('gender'),
            'age' => $request->input('age'),
            'password' => bcrypt($request->input['password']),
            'confirmation_code' => $confirmation_code,
            'phone_number' => $request->input('phone_number'),
            'user_type'=>$userType,
        ]);

//        Mail::send('email.verify', $confirmation_code, function($message) {
//            $message->to(Input::get('email'), Input::get('name'))
//                ->subject('Verify your email address');
//        });

       
        Session::flash('success', 'Sir,Thanks for signing up! Please check your email.');

       return Redirect::to('student-registration');
    }
    
    
    
      public function saveAdminProfile(Request $request)
    {
        $rules = [
            'state' => 'required',
            'city' => 'required',
            'locality' => 'required',
            'message' => 'required|Max:200',
           
        ];
  
         $messages = [   'locality.required'=>'Please Enter Your Locality.',
                          
                     
                  ];

        $validator = Validator::make($request->all(), $rules,$messages);

        if($validator->fails())
        {
            return Redirect::back()->withInput()->withErrors($validator);
        } 
        
        else{
           
            
            AdminProfile::create([
            'state' => $request->input('state'),
            'city' => $request->input('city'),
            'locality' => $request->input('locality'),
            'message' => $request->input('message'),    
        ]);
            
        }
        
        Session::flash('success', 'Admin profile Saved!!');

       return Redirect::to('student-registration'); 
    }
    
    
    
    
    
    
}