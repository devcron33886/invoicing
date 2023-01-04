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
    			<div class="col-sm-4 col-lg-4 container-xl col-md-12">
    				<form action="{{ route('products.store') }}" method="POST" class="card">
                        @csrf
                        <div class="card-header">
                            <h2 class="card-title">Add New Products or Service</h3>
                        </div>
                        <div class="card-body">
                            <div class="mb-4">
                                <label>Product or service Name</label>
                                <input type="text" name="name" placeholder="Enter product or service name, ex: IPhone XR" class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                <span class="invalid-feedback">
                                    {{$message}}
                                </span>
                                
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label>Product or service code</label>
                                 <input type="text" name="product_code" placeholder="Enter product or service code, ex: WD-001" class="form-control @error('product_code') is-invalid @enderror">
                                @error('product_code')
                                <span class="invalid-feedback">
                                    {{$message}}
                                </span>
                                
                                @enderror
                            </div>
                            <label>Product or service price</label>
                             <input type="number" name="price" placeholder="Enter product or service price, ex: 300000" class="form-control @error('price') is-invalid @enderror">
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
            </div>
        </div>
    </div>
@endsection
@section('scripts')
@stop
