<?php

namespace App\Http\Controllers\Web\Sponsors;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Stripe\Charge;
use Stripe\Customer;
use Stripe\Stripe;

class DonationController extends Controller
{
    public function donate(Request $request)
    {
        try {
            Stripe::setApiKey(env('STRIPE_SECRET'));

            $customer = Customer::create([
                'email'  => $request->stripeEmail,
                'source' => $request->stripeToken,
            ]);

            $charge = Charge::create([
                'customer' => $customer->id,
                'amount'   => 1999,
                'currency' => 'usd',
            ]);

            return 'Charge successful, you get the course!';
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }
}
