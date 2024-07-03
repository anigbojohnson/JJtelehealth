<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\EmailVerification;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;


class VerifyEmailController extends Controller
{


    public function send($email, $token)
    {
        
        $user = EmailVerification::where('email', $email)->first();

        if (!$user || !hash_equals($user->token, $token)) {
            // Handle invalid email or token
            $user->delete();
            $user = User::where('email', $email)->first();
            $user->delete();
            return redirect()->route('showRegistrationForm')->with('error',  'invalid or expired token, please register again');
        }
        $user->delete();

        $user = User::where('email', $email)->first();
        $user->email_verified_at = Carbon::now();
        $user->save();
        return redirect()->route('login')->with('success',  'successfull registration , you can now login.');

 
    }
}
