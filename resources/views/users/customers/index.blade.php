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
                        customers
                    </h2>
                </div>
                <!-- Page title actions -->
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            @if(session('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong>  {{ session('message')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if(session('errors'))
                <div class="alert alert-danger">
                    {{ session('errors')}}
                </div>
            @endif
            <div class="row">
                <div class="col-sm-4 col-lg-4 container-xl col-md-12">
                    <form action="{{ route('customers.store') }}" method="POST" class="card">
                        @csrf
                        <div class="card-header">
                            <h2 class="card-title">Add New customer</h3>
                        </div>
                        <div class="card-body">
                            <label>CustomerName</label>
                            <input type="text" name="name" placeholder="Enter customer name, ex: John Doe"
                                   class="form-control @error('name') is-invalid @enderror" value="{{ old('name')}}">
                            @error('name')
                            <span class="invalid-feedback">
                                    {{$message}}
                                </span>

                            @enderror
                            <label>Customer Mobile</label>
                            <input type="tel" name="mobile"
                                   placeholder="Enter customer mobile, ex: +1 000 00000"
                                   class="form-control @error('mobile') is-invalid @enderror" value="{{ old('mobile')}}">
                            @error('mobile')
                            <span class="invalid-feedback">
                                    {{$message}}
                                </span>

                            @enderror

                            <label>Customer Email</label>
                            <input type="email" name="email" placeholder="Enter customer email, ex: john@mail.com"
                                   class="form-control @error('email') is-invalid @enderror" value="{{ old('email')}}">
                            @error('email')
                            <span class="invalid-feedback">
                                    {{$message}}
                                </span>

                            @enderror
                            <label>Customer Company</label>
                            <input type="text" name="company" placeholder="Enter customer company, ex: We code Ltd. or Freelancer"
                                   class="form-control @error('company') is-invalid @enderror" value="{{ old('company')}}">
                            @error('company')
                            <span class="invalid-feedback">
                                    {{$message}}
                                </span>

                            @enderror
                            <label>Customer Website</label>
                            <input type="url" name="website" placeholder="Enter customer website, ex: https://wecode.com"
                                   class="form-control @error('website') is-invalid @enderror" value="{{ old('website')}}">
                            @error('website')
                            <span class="invalid-feedback">
                                    {{$message}}
                                </span>

                            @enderror
                            <label>Customer Country</label>
                            <input type="text" name="country" placeholder="Enter customer country, ex: USA"
                                   class="form-control @error('country') is-invalid @enderror" value="{{ old('country')}}">
                            @error('country')
                            <span class="invalid-feedback">
                                    {{$message}}
                                </span>

                            @enderror
                            <label>Customer State</label>
                            <input type="text" name="state" placeholder="Enter customer state, ex: Washington DC"
                                   class="form-control @error('state') is-invalid @enderror" value="{{ old('state')}}">
                            @error('state')
                            <span class="invalid-feedback">
                                    {{$message}}
                                </span>
                            @enderror
                            <label>Customer Address</label>
                            <input type="address" name="address" placeholder="Enter customer address, ex: KG 213 ST Avenue"
                                   class="form-control @error('address') is-invalid @enderror" value="{{ old('address')}}">
                            @error('address')
                            <span class="invalid-feedback">
                                    {{$message}}
                                </span>
                            @enderror
                            

                        </div>
                        <div class="card-footer d-flex align-items-center">
                            <div class="pull-right">
                                
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-sm-8 col-lg-8 container-xl-8 col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">My Customers</h3>
                        </div>
                        <div class="card-body border-bottom py-3">
                            
                        </div>
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter text-nowrap datatable">
                                <thead>
                                <tr>

                                    <th class="w-1">No.

                                    </th>
                                    <th>Customer Name</th>
                                    <th>Customer Phone</th>
                                    <th>Customer Email</th>
                                    
                                    <th>Created</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($customers as $customer)
                                    <tr>
                                        <td><span class="text-muted">{{$customer->id}}</span></td>
                                        <td><a href="{{ route('customers.edit',$customer->id) }}" class="text-reset"
                                               tabindex="-1">{{ $customer->name }}</a></td>

                                        <td>
                                            {{ $customer->mobile}}
                                        </td>
                                        <td>
                                            {{ $customer->email }}
                                        </td>
                                        
                                        <td>{{ \Carbon\Carbon::parse($customer->created_at)->toDayDateTimeString() }}</td>
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
                                        <td colspan="7"> You have no customer or service</td>
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
