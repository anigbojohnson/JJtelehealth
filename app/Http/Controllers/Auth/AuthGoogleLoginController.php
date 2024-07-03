<?php

namespace App\Http\Controllers\Auth;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

use Illuminate\Support\Facades\Auth;

class AuthGoogleLoginController extends Controller
{
    //

    
public function redirect() { 
    return Socialite::driver('google')->redirect();
    }

public function callback() {
       try{
        $googleUser = Socialite::driver('google')->user();

        $userExists = User::where('email', $googleUser->email)
        ->where('provider', '!=', 'google')
        ->exists();

        if($userExists){
            return redirect()->route('login')->with('error', 'You have different means of login.');
        }
        $user = User::where([
            'provider-id' => $googleUser->id,
            'provider' =>'google'
        ])->first();

            if(!$user){

                $user = User::create([
                    'provider-id' => $googleUser->id,
                    'provider' =>'google',                
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'email_verified_at'=> now()]
                );

              
            }
            Auth::login($user);
            if (Auth::check()) {
                // User is authenticated
                return redirect('/dashboard');
            } else {
                // User is not authenticated
                return redirect('/dashboard');

            }
            



    }
    catch(\Exception $e){
        return redirect('/login');
    }

 
    }
}
