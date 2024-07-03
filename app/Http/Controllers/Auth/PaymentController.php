<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use GuzzleHttp\Client;
use App\Models\User;
use App\Models\Solutions;
use App\Models\Payment;
use App\Models\MedicalCertificate;


use Illuminate\Http\Request;

class PaymentController extends Controller
{
    //

public function show($id , $action, $failLink) {
    switch($action){
        case 'MC':
            
            if(MedicalCertificate::find($id) && Payment::where('mc_id', $id)->exists()===false){
                $solutions = Solutions::where('solution_id', 'like', 'MC%')->get();
                session()->put('mc_id', $id);
                session()->put('action', 'certificate');
                return view('auth.payment', ['solutions' => $solutions]); 
            }else{
                return view('auth.'.$failLink);
            }
            break;
    }
}

public function make($request) {

            $stripe = new \Stripe\StripeClient(config('services.stripe.secret'));


            $response = $stripe->checkout->sessions->create([
            'line_items' => [
                [
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => ['name' =>  $request->solution_name],
                    'unit_amount' => $request->cost * 100,
                ],
          
                'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'success_url' => route('success').'?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('cancel'),
            ]);

            if(isset($response->id) && $response->id != ""){
                session()->put('solution_id', $request->solution_id);
                return response()->json([$response->url], 200);

            }
            else{
                return redirect()->route('cancel');
            }
        }

    public function success(Request $request) {
        if(isset($request->session_id)){

            
            $stripe = new \Stripe\StripeClient(config('services.stripe.secret'));
            $response = $stripe->checkout->sessions->retrieve($request->session_id);

            $payment = new Payment();
            $payment->payment_id = $response->payment_intent;
            $payment->product_id = session()->get('solution_id');
            $payment->customer_email = Auth::user()->email;
            $payment->mc_id = session()->get('mc_id');
            $payment->wl_id = session()->get('wl_id');

            $payment->save();
            session()->forget('solution_id');
            session()->forget('mc_id');
            session()->forget('wl_id');


            return redirect()->route(session()->get('action'))->with('success', 'Payment is successfully !');

        }
        else{
            return redirect()->route('cancel');
        }
    }
    public function cancel(Request $request) {
        return "Payment is canceled.";

    }
}
