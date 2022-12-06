<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SocialController extends Controller
{
    public function passwordCreation(Request $request){
        $user = User::where('email',$request->email);

        if(!empty($user) && $request->password===$request->password_confirmation){
            $user->update([
                'password' => Hash::make($request->password),
            ]);
        }

        return view('home');
    }

    public function redirectGoogle(){
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle(){
        //dd(Socialite::driver('google')->user());
        //Socialite::driver('google')->user()->user['email_verified'];

        try{
            $user_google = Socialite::driver('google')->user();
            $user = User::where('email', $user_google->getEmail())->first();

            if(!$user){
                $new_user = User::create([
                    "name" => $user_google->getName(),
                    "email" => $user_google->getEmail(),
                    "google_id" => $user_google->getId(),
                    "email_verified_at" => date('Y/m/d H:i:s'),
                ]);

                Auth::login($new_user);
                return view('auth.password-creation', ['email' =>$user_google->getEmail()]);
            }else{
                Auth::login($user);
                return to_route('home');
            }
        }catch(Exception $e){
            dd("error");
        }
    }


    public function redirectGithub(){
        return Socialite::driver('github')->redirect();
    }

    public function callbackGithub(){
        //dd(Socialite::driver('github')->user());
        try{
            $user_github = Socialite::driver('github')->user();
            $user = User::where('email', $user_github->getEmail())->first();

            if(!$user){
                $new_user = User::create([
                    "name" => $user_github->getName(),
                    "email" => $user_github->getEmail(),
                    "github_id" => $user_github->getId(),
                    "email_verified_at" => date('Y/m/d H:i:s'),
                ]);

                Auth::login($new_user);
                return view('auth.password-creation', ['email' =>$user_github->getEmail()]);
            }else{
                Auth::login($user);
                return to_route('home');
            }
        }catch(Exception $e){
            dd("error");
        }
    }
}

