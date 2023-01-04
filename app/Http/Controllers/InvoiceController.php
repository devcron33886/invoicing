<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;
use App\Models\Invoice;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{

    public function index()
    {
        $invoices=Invoice::with(['customer'])->where('user_id',auth()->id())
            ->orderByDesc('id')
            ->paginate(10);
        return  view('users.invoices.index',compact('invoices'));
    }

    public function create()
    {
        $customers=DB::table('customers')->where('created_by',auth()->id())->get();
        $products=DB::table('products')->where('created_by',auth()->id())->get();
        return view('users.invoices.create',compact('customers','products'));
    }

    public function store(StoreInvoiceRequest $request)
    {
        $invoice = new Invoice();
        $invoice->customer_id=$request->input('customer_id');
        $invoice->user_id=auth()->user()->id;
        $invoice->invoice_number=$request->input('invoice_number');
        $invoice->due_date=$request->input('due_date');
        $invoice->invoice_date=now();
        $invoice->subtotal=$request->input('subtotal');
        $invoice->tax=$request->input('tax');
        $invoice->total=$request->input('total');
        $invoice->notes=$request->input('notes');
        $invoice->status= 0;
        $invoice->save();
        return 'success saved';


    }

    public function edit(Invoice $invoice)
    {
        return view('users.invoices.edit',compact('invoice'));
    }

    public function update(UpdateInvoiceRequest $request, Invoice $invoice)
    {

    }

    public function destroy(Invoice $invoice)
    {
        $invoice->delete();
    }
}
