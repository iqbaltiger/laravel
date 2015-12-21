<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/','Auth\AuthController@getRegister');

// Authentication routes...
Route::post('auth/login', 'Auth\AuthController@Login');
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::get('login', function(){
    
    return view('auth.login');
});
Route::get('logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::post('/student-registration','RegistrationController@store');
Route::get('/student-registration','Auth\AuthController@getRegister');
Route::post('/saveProfile','RegistrationController@profileSave');

Route::get('/student-profile',function(){
    
    return view('profile.student-profile');
});

Route::get('/register/teacher',function(){
    
    return view('teacher.register_teacher');
});
Route::post('/saveTeacherProfile','RegistrationController@storeUserType');

Route::get('/register/area-admin',function(){
    
    return view('admin.register_admin');
});

Route::post('/saveAdminUser','RegistrationController@storeUserType');

Route::get('/admin-profile',function(){
    
    return view('profile.admin-profile');
});

Route::post('/saveAdminProfile','RegistrationController@saveAdminProfile');

Route::get('/admin-profile',function(){
    
    return view('profile.admin-profile');
});


Route::get('/teacher-profile',function(){
    
    return view('profile.teacher-profile');
});

Route::post('/saveTeacherProfile','RegistrationController@profileTeacherSave');
