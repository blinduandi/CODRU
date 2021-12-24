<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller{

    public function redirectToGoogle(){
     return Socialite::driver('google')->redirect();   
    }

    public function handleGoogleCallback(){
        try{
            $user= Socialite::driver('google')->user();
            $findUser= User::where('email',$user->email)->first();

            if($findUser!=NULL){
                Auth::login($findUser);
                return redirect()->intended('/');
            }
            else{
                //register
                $newUser = User::create([
                    'name'=>$user->name,
                    'email'=>$user->email,
                    'google_id'=>'true',
                    'password'=>encrypt('mypassword')
                ]);
                Auth::login($newUser);
                return redirect()->intended('/');
            }
        }
        catch(Exception $e){
            dd($e->getMessage());
        }
    }

    public function logout () {
        //logout user
        Auth::logout();
        // redirect to homepage
        return redirect('/');
    }
    public function redirectToFacebook(){
        return Socialite::driver('facebook')->redirect();   
       }
   
       public function handleFacebookCallback(){
        try {
    
            $user = Socialite::driver('facebook')->user();
            $facebookId = User::where('email', $user->id)->first();


            if($facebookId!=NULL){
                Auth::login($facebookId);
                return redirect()->intended('favorite');
            }else{
                $newUser = User::create([
                    'name'=>$user->name,
                    'email'=>$user->email,
                    'facebook_id'=>'true',
                    'password'=>encrypt('mypassword')
                ]);
                Auth::login($newUser);
                return redirect()->intended('favorite');
            }
    
        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
       }

}