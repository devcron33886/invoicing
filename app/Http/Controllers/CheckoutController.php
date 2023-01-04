<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Exception;

class CheckoutController extends Controller
{
    public function __invoke(Plan $plan)
    {
        $currentPlan = auth()->user()->subscription('default')->stripe_plan ?? null;
        if (! is_null($currentPlan) && $currentPlan != $plan->stripe_plan_id) {
            try {
                auth()->user()->subscription('default')->swap($plan->stripe_plan_id);

                return redirect()->route('accounts.plans');
            } catch (Exception $exception) {
                return redirect()->back()->withErrors($exception->getMessage());
            }
        }
        $intent = auth()->user()->createSetUpIntent();

        return view('users.billing.index', compact('plan','intent'));
    }
}
