<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class SocialController extends Controller
{
    public function redirect(){
        return Socialite::driver('google')->redirect();
    }

    public function callback(){
        //dd(Socialite::driver('google')->user());

        try{
            $user_google = Socialite::driver('google')->user();
            $user = User::where('google_id', $user_google->getId())->first();

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
}
