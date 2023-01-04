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
                        Products
                    </h2>
                </div>
                <!-- Page title actions -->
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <div class="col-sm-4 col-lg-4 container-xl col-md-12 mt-3">
                    <form action="{{ route('products.store') }}" method="POST" class="card">
                        @csrf
                        <div class="card-header">
                            <h2 class="card-title">Add New Products or Service</h3>
                        </div>
                        <div class="card-body">

                            <label>Product or service Name</label>
                            <input type="text" name="name" placeholder="Enter product or service name, ex: IPhone XR"
                                   class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                            <span class="invalid-feedback">
                                    {{$message}}
                                </span>

                            @enderror
                            <label>Product or service code</label>
                            <input type="text" name="product_code"
                                   placeholder="Enter product or service code, ex: WD-001"
                                   class="form-control @error('product_code') is-invalid @enderror">
                            @error('product_code')
                            <span class="invalid-feedback">
                                    {{$message}}
                                </span>

                            @enderror

                            <label>Product or service price</label>
                            <input type="number" name="price" placeholder="Enter product or service price, ex: 300000"
                                   class="form-control @error('price') is-invalid @enderror">
                            @error('price')
                            <span class="invalid-feedback">
                                    {{$message}}
                                </span>

                            @enderror
                        </div>
                        <div class="card-footer d-flex align-items-center">
                            <div class="pull-right">
                                <button type="submit" class="btn btn-outline-primary"> Save product</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-sm-8 col-lg-8 container-xl-8 col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">PRODUCTS OR SERVICES</h3>
                        </div>
                        <div class="card-body border-bottom py-3">
                            <div class="d-flex">
                                <div class="text-muted">
                                    Show
                                    <div class="mx-2 d-inline-block">
                                        <input type="text" class="form-control form-control-sm" value="8" size="3"
                                               aria-label="Invoices count">
                                    </div>
                                    entries
                                </div>
                                <div class="ms-auto text-muted">
                                    Search:
                                    <div class="ms-2 d-inline-block">
                                        <input type="text" class="form-control form-control-sm"
                                               aria-label="Search invoice">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter text-nowrap datatable">
                                <thead>
                                <tr>

                                    <th class="w-1">No.

                                    </th>
                                    <th>Product Name</th>
                                    <th>Product Code</th>
                                    <th>Price</th>
                                    <th>Product Status</th>
                                    <th>Created</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($products as $product)
                                    <tr>
                                        <td><span class="text-muted">{{$product->id}}</span></td>
                                        <td><a href="{{ route('products.edit',$product->id) }}" class="text-reset"
                                               tabindex="-1">{{ $product->name }}</a></td>

                                        <td>
                                            {{ $product->product_code}}
                                        </td>
                                        <td>
                                            {{ \Cknow\Money\Money::USD($product->price)}}
                                        </td>
                                        <td>
                                            @if($product->status==1)
                                                <span class="badge bg-success me-1"></span> Available
                                            @elseif($product->status== null))
                                                <span class="badge bg-danger me-1"></span> Not Available
                                            @endif

                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($product->created_at)->toDayDateTimeString() }}</td>
                                        <td class="text-end">
                                                    <span class="dropdown">
                              <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport"
                                      data-bs-toggle="dropdown">Actions</button>
                              <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">
                                  Action
                                </a>
                                <a class="dropdown-item" href="#">
                                  Another action
                                </a>
                              </div>
                            </span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7"> You have no product or service</td>
                                    </tr>
                                @endforelse

                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer d-flex align-items-center">
                            <p class="m-0 text-muted">Showing <span>1</span> to <span>8</span> of <span>16</span>
                                entries</p>
                            <ul class="pagination m-0 ms-auto">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                             viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                             stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                            <polyline points="15 6 9 12 15 18"/>
                                        </svg>
                                        prev
                                    </a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item active"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item"><a class="page-link" href="#">5</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">
                                        next <!-- Download SVG icon from http://tabler-icons.io/i/chevron-right -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                             viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                             stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                            <polyline points="9 6 15 12 9 18"/>
                                        </svg>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
@stop
