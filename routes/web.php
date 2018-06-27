<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route:: get('/',function (){
    return view('home');
});

Route:: get('/login',function (){
    return view('login');
});
Route:: get('/about',function (){
    return view('about');
});

Route:: get('/register',function (){
    return view('register.register');
});

Route:: post('/register_action','RegisterController@store');

Route:: post('/login_check','RegisterController@login');

Route:: get('/logout',function (){
    Auth::logout();
    return Redirect::to('');
})->middleware('auth');