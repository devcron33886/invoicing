@extends('layouts.auth')

@section('content')
    <div class="text-center mb-4">
        <a href="." class="navbar-brand navbar-brand-autodark"><img src="{{ asset('static/logo.svg')}}" height="36" alt=""></a>
    </div>
    <form class="card card-md" method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="card-body">
            <h2 class="card-title text-center mb-4">Forgot password</h2>
            <p class="text-muted mb-4">Enter your email address and your password will be reset and emailed to you.</p>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="mb-3">
                <label for="email" class="form-label">{{ __('Email Address') }}</label>

                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                       value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror

            </div>

            <div class="form-footer">
                <button type="submit" class="btn btn-primary w-100">
                    {{ __('Send Password Reset Link') }}
                </button>
            </div>
        </div>
    </form>
@endsection
