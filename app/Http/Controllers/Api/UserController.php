<?php

namespace App\Http\Controllers\Api;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

use App\model\User;
use Hash;

class UserController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    function login(){
        $email = Input::get('email');
        $password = sha1( Input::get('password') );

        $user = User::where('email' , $email )->where('password' , $password )->get();
        if( count($user) > 0 ){
            $key = sha1( uniqid() );

            $u = $user[0];
            $u->remember_token = $key;
            $u->save();

            $result = array(
                'success' => true,
                'key' => $key,
                'name' => $u->name,
                'email' => $u->email 
            );
        }else{
            $result = array(
                'success' => false,
                'message' => 'email or password incorrect!' 
            );
        }



    	return  $result;
    }
    function logout(){

    }

    function register( Request $request ){
        
        $name = $request->input('name');
        $email = $request->input('email');
        $password = sha1( $request->input('password') );

        $exist_user = User::where('email' , $email )->count();

        if(   $exist_user == 0  ){
            $user = new User;

            $user->name = $name;
            $user->email = $email;
            $user->password = $password;

            $user->save();

           

            $result = array(
                'success' => true,
                'message' => 'register success.'

            );
 
        }else{
            $result = array(
                'success' => false,
                'message' => 'email is existing.'
            );
        }

        return $result;

    }


    function forgotpassword(){

    }
    function loginfacebook(){

    }
    
}
