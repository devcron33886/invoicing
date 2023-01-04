<?php

namespace App\Http\Controllers;

use App\Models\Plan;

class PlanController extends Controller
{
    public function __invoke()
    {
        $plans = Plan::where('status', true)->get();
        $currentSubscription = auth()->user()->subscription('default')->stripe_plan ?? null;
        $paymentMethods = auth()->user()->paymentMethods();

        return view('users.plans.index', compact('plans', 'currentSubscription', 'paymentMethods'));
    }
}
