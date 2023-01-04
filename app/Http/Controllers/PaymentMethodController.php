<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentMethodController extends Controller
{
    public function create()
    {
        return view('users.payment-methods.create');
    }

    public function store(Request $request)
    {
    }

    public function edit($id)
    {
        return view('users.payment-methods.edit', compact('id'));
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
