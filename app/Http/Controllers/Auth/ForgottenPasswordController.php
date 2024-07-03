<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\custom\service\EmailVerificationService;
use App\Models\EmailVerification;


class ForgottenPasswordController extends Controller
{
    protected $forgottenPasswordService;

    public function __construct(EmailVerificationService $forgottenPasswordService)
    {
        $this->forgottenPasswordService = $forgottenPasswordService;

    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function send(Request $request)
    {
        // Validate the incoming request data

        $validator = Validator::make($request->all(), [
            'email' => 'required',
        ]);

        if ($validator->fails()) {
            // Return validation errors as JSON response
            return response()->json(['errors' => $validator->errors()], 422);
        }
    
        $user = User::where('email', $request->email)
            ->whereNotNull('email_verified_at')
            ->first();

        if( $user ){

            $this->forgottenPasswordService->sendVerificationLink($user,"forgotten-password");
            return response()->json(['message' => 'messege sent to your email.']);

        }
        return response()->json(['error' => 'failure to send to your email'], 422);

    }

    public function changePassword($email , $token)
    {
        $user = EmailVerification::where('email', $email)
            ->where('token', $token)
            ->first();

        // If the user doesn't exist or the token is invalid, return an error
        if (!$user) {
            abort(404);
        }

        // Pass the user's email and token to the view
        return view('auth.change-password', compact('email', 'token'));
    }






    public function saveChangedPassword(Request $request, $email, $token)
    {
        // Validate the incoming request data
        $request->validate([
            'password' => 'required|min:8|confirmed|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/',
        ], [
            'password.regex' => 'The password must contain at least one lowercase letter, one uppercase letter, one number, and one special character.'
        ]);

        // Retrieve the user by email and verify the token
        $user = EmailVerification::where('email', $email)->first();

        // If the user doesn't exist or the token is invalid, return an error
        if (!$user || !hash_equals($user->token, $token)) {
            return redirect()->route('showRegistrationForm')->with('error', 'Invalid email or token');
        }
        $user->delete();
        $user = User::where('email', $email)->first();
        // Update the user's password
        $user->update([
            'password' => Hash::make($request->password),
        ]);

        // Redirect the user with a success message
        return redirect()->route('login')->with('success', 'Password changed successfully, you can now login');
    }
}
