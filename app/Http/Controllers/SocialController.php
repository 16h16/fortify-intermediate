<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class SocialController extends Controller
{
    public function redirectGoogle(){
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle(){
        //dd(Socialite::driver('google')->user());

        try{
            $user_google = Socialite::driver('google')->user();
            $user = User::where('email', $user_google->getEmail())->first();

            if(!$user){
                $new_user = User::create([
                    "name" => $user_google->getName(),
                    "email" => $user_google->getEmail(),
                    "google_id" => $user_google->getId(),
                ]);

                Auth::login($new_user);
                return to_route('home');
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
                ]);

                Auth::login($new_user);
                return to_route('home');
            }else{
                Auth::login($user);
                return to_route('home');
            }
        }catch(Exception $e){
            dd("error");
        }
    }
}

