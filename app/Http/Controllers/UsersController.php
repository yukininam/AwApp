<?php

namespace App\Http\Controllers;
use\App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function register(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            //check if user already exist
           // echo "<pre>"; print_r($data); die;
           $usersCount = User::where('email',$data['email'])->count();
           if($usersCount>0){
               return redirect()->back()->with('flash_message_error','Email already exist!');
           }else{
               echo "Success"; die;
           }
        }
        return view('users.login_register');
    }

    public function checkEmail(Request $request){
        //CHeck if user email already exist
        $data = $request->all();
        $usersCount = User::where('email',$data['email'])->count();
        if($usersCount>0){
            echo "false";
        }else{
            echo "true";
        }
    }
}
