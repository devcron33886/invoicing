@extends('layouts.app')
@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Overview
                    </div>
                    <h2 class="page-title">
                        Invoices
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                  <span class="d-none d-sm-inline">
                    <a href="{{ route('invoices.create') }}" class="btn btn-indigo">
                      New Invoice
                    </a>
                  </span>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="col-lg-12">
                <div class="card">
                    <div class="table-responsive">
                        <table class="table table-vcenter card-table">
                            <thead>
                            <tr>
                                <th>Customer ame</th>
                                <th>Customer Email</th>
                                <th>Amount</th>
                                <th>Invoice Date</th>
                                <th>Status</th>
                                <th class="w-1"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($invoices as $invoice)
                                <tr>
                                    <td>{{ $invoice->customer->name }}</td>
                                    <td class="text-muted">
                                        {{ $invoice->customer->email }}
                                    </td>
                                    <td>{{ $invoice->getTotal()}}</td>
                                    <td class="text-muted">{{ $invoice->getFormattedInvoiceDate() }}</td>
                                    <td class="text-muted">
                                    {{ $invoice->status }}
                                    </td>
                                    <td>
                                        <a href="#">Edit</a>
                                    </td>
                                </tr>
                            @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
