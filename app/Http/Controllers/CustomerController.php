<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = DB::table('customers')->where('created_by', auth()->user()->id)->get();

        return view('users.customers.index', compact('customers'));
    }

    public function store(StoreCustomerRequest $request)
    {
        DB::beginTransaction();
        try {
            DB::commit();
            $customer = new Customer();
            $customer->name = $request->input('name');
            $customer->mobile = $request->input('mobile');
            $customer->email = $request->input('email');
            $customer->company = $request->input('company');
            $customer->website = $request->input('website');
            $customer->country = $request->input('country');
            $customer->state = $request->input('state');
            $customer->address = $request->input('address');
            $customer->created_by = auth()->user()->id;
            $customer->save();
        } catch(\Exception $exception) {
            DB::rollBack();

            return back()->withErrors($exception->getMessage());
        }

        return to_route('customers.index')->withMessage('Customer added successfully');
    }

    public function edit(Customer $customer)
    {
        return view('users.customers.edit',compact('customer'));
    }

    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $customer->update($request->all());
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return to_route('customers.index');
    }
}
