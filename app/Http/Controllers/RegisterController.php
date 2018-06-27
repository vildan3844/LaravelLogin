<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

use App\Register;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class RegisterController extends Controller
{
    public function store()
    {
        //echo 'deneme';
        $data = Input::except(array('_token'));
        //var_dump($data);

        $rule = array(
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'cpassword' => 'required|same:password'
        );

        $message = array(
            'cpassword.required' => 'the confirm password is required',
            'cpassword.min' => 'the confirm password must be at least 6 characters',
            'cpassword.same' => 'the confirm password and password must same',
        );

        $validator = Validator::make($data,$rule,$message);

        if ($validator -> fails()){
            return Redirect::to('register') -> withErrors($validator);
        }else{
            Register::formstore(Input::except(array('_token','cpassword')));
            return Redirect::to('register')->with('success','Registration Successful');
        }
    }

    public function login()
    {
        $data = Input::except(array('_token'));
        $rule = array(
            'email' => 'required|email',
            'password' => 'required',
        );

        $validator = Validator::make($data,$rule);

        if ($validator -> fails()){
            return Redirect::to('login') -> withErrors($validator);
        }else{
            //$data = Input::except(array('_token'));
            $userdata=array(
                'email'=>Input::get('email'),
                'password'=>Input::get('password'),
            );
            if(Auth::attempt($userdata))
            {
                return Redirect::to('');

            }else{
                return Redirect::to('login');

            }


        }
    }
}
