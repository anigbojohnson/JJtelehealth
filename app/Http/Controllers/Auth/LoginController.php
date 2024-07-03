<?php
namespace App\Http\Controllers\Auth;

use App\Models\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
        /**
     * Show the registration form.
     *
     * @return \Illuminate\View\View
     */
    public function loginForm($param,$action)
    {
        return view('auth.login', ['param' => $param,'action'=>$action]);
    }
      /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request,$param, $action)
    {
        
        // Validate the form data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $userExists = User::where('email', $request->email)
        ->where('provider', '!=', 'form register')
        ->exists();
        if($userExists){
       

            return redirect()->route('login')->with('error', 'You have different means of login.');
        }

        // Attempt to authenticate the user
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Authentication successful, redirect to the intended page
           if($param==="normal")
                return redirect()->intended('/dashboard');
            else
                return redirect()->intended("/medical-certificate/".$param."/".$action);


        } else {
            // Authentication failed, redirect back with error message
            return redirect()->back()->withInput($request->only('email'))->withErrors([
                'error' => 'These credentials do not match our records.',
            ]);
        }
    }

}
