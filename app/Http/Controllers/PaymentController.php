<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Exception;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function processPayment(Request $request)
    {
        $plan = Plan::findOrFail($request->input('plan_id'));
        try {
            auth()->user()->newSubscription($plan->name, $plan->stripe_plan_id)->create($request->input('payment-method'));

            return redirect()->route('accounts.plans')->with('Subscribed successfully');
        } catch (Exception $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }

    public function cancel()
    {
        auth()->user()->subscription('default')->cancel();

        return redirect()->route('accounts.plans');
    }

    public function resume()
    {
        auth()->user()->subscription('default')->resume();

        return redirect()->route('accounts.plans');
    }
}
