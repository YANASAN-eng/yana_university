<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Stripe\Stripe;
use Stripe\Charge;

class StripeController extends Controller
{
    /**
     * 画面を表示
     * 
     * @param void
     * @return void
     */
    public function chargeShow()
    {
        return view('credit.form');
    }
    /**
     * Stripeと連携
     * 
     * @param Request $request
     * @return void
     */
    public function charge(Request $request)
    {
        Stripe::setApiKey(config('services.stripe.secret'));
        $charge = Charge::create(array(
            'amount' => 100,
            'currency' => 'jpy',
            'source' => request()->stripeToken,
        ));
        return back();
    }
}
