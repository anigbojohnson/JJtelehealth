<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use GuzzleHttp\Client;
use App\Models\User;

use Illuminate\Http\Request;

class AuthMicrosoftLoginController extends Controller
{
    //

public function redirect() {
    
    $query = http_build_query([
        'client_id' => env('MICROSOFT_CLIENT_ID'),
        'redirect_uri' => route('auth.microsoft.callback'),
        'response_type' => 'code',
        'scope' => 'User.Read', // Adjust scopes as needed
    ]);

    return redirect('https://login.microsoftonline.com/common/oauth2/v2.0/authorize?' . $query);
    }

public function callback(Request $request) {
    
    $httpClient = new Client();
    $response = $httpClient->post('https://login.microsoftonline.com/common/oauth2/v2.0/token', [
        'form_params' => [
            'client_id' => env('MICROSOFT_CLIENT_ID'),
            'client_secret' => env('MICROSOFT_CLIENT_SECRET'),
            'code' => $request->input('code'),
            'redirect_uri' => route('auth.microsoft.callback'),
            'grant_type' => 'authorization_code',
        ],
    ]);

    $accessToken = json_decode((string) $response->getBody(), true)['access_token'];
    $userEndpoint = 'https://graph.microsoft.com/v1.0/me';

    $response = $httpClient->request('GET', $userEndpoint, [
        'headers' => [
            'Authorization' => 'Bearer ' . $accessToken,
            'Accept' => 'application/json',
        ],
    ]);

    // Decode the JSON response body to an associative array
    $userData = json_decode($response->getBody(), true);
    $userExists = User::where('email', $userData['mail'])
                  ->where('provider', '!=', 'microsoft')
                  ->exists();

        if($userExists){
            return redirect()->route('login')->with('error', 'You have different means of login.');
        }
        $user = User::where([
            'provider-id' =>  $userData['id'],
            'provider' =>'microsoft'
        ])->first();

            if(!$user){
                
                $user = User::create([
                    'provider-id' =>  $userData['id'] ,
                    'provider' =>'microsoft',                
                    'name' =>  $userData['displayName'],
                    'email' => $userData['mail'],
                    'email_verified_at'=> now()]
                );

            }
            Auth::login($user);
            return redirect('/dashboard');

    // Output the user data
    }
}
