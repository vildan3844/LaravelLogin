<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Register extends Authenticatable
{
    protected $table="register_users";


    public static function formstore($data)
    {
        $username=Input::get('username');
        //echo $username." ";
        $email=Input::get('email');
        //echo $email." ";
        $password=Hash::make(Input::get('password')) ;
        //echo $password;

        $users=new Register();
        $users -> name=$username;
        $users -> email=$email;
        $users -> password=$password;

        $users ->save();


    }
}
