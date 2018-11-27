<?php

namespace App\Http\Controllers;
use App\User;
use App\Country;
use Auth;
use Session;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function userLoginRegister(){
        return view('users.login_register');
    }

    public function register(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            //check if user already exist
           // echo "<pre>"; print_r($data); die;
           $usersCount = User::where('email',$data['email'])->count();
           if($usersCount>0){
               return redirect()->back()->with('flash_message_error','Email already exist!');
           }else{
               $user = new User;
               $user->name = $data['name'];
               $user->email = $data['email'];
               $user->password = bcrypt($data['password']);
               $user->save();
               if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){
                Session::put('frontSession',$data['email']);
                   return redirect('/cart');
               }
           }
        }
    }

    public function login(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){
                Session::put('frontSession',$data['email']);
                return redirect('/cart');
            }else{
                return redirect()->back()->with('flash_message_error','Invalid Username or Password');
            }
        }
    }

    public function logout(){
        Auth::logout(); 
        Session::forget('frontSession'); 
        return redirect('/');
    }

    public function account(Request $request){
        $user_id = Auth::user()->id;
        $userDetails = User::find($user_id);
        $countries = Country::get();

        
    /*    if(empty($data['name'])){
            return redirect()->back()->with('flash_message_error','Please enter your name');
        }

        if(empty($data['address'])){
            $data['address']='';
        }
        if(empty($data['city'])){
            $data['city']='';
        }
        if(empty($data['state'])){
            $data['state']='';
        }
        if(empty($data['country'])){
            $data['country']='';
        }
        if(empty($data['pincode'])){
            $data['pincode']='';
        }
        if(empty($data['mobile'])){
            $data['mobile']='';
        } */

        if($request->isMethod('post')){
            $data = $request->all();
            $user = User::find($user_id);
            $user->name = $data['name'];
            $user->address = $data['address'];
            $user->city = $data['city'];
            $user->state = $data['state'];
            $user->country = $data['country'];
            $user->pincode = $data['pincode'];
            $user->mobile = $data['mobile'];
            $user->save();
            return redirect()->back()->with('flash_message_success','Your account details has been successfully updated!');
        }
        return view('users.account')->with(compact('countries','userDetails'));
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
