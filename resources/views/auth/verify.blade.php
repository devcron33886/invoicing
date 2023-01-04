@extends('layouts.auth')

@section('content')

    <div class="text-center mb-4">
        <a href="." class="navbar-brand navbar-brand-autodark"><img src="./static/logo.svg" height="36" alt=""></a>
    </div>
    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}" autocomplete="off">
        @csrf
        <div class="card-body">
            @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    {{ __('A fresh verification link has been sent to your email address.') }}
                </div>
            @endif

            {{ __('Before proceeding, please check your email for a verification link.') }}
            {{ __('If you did not receive the email') }},
            <h2 class="card-title text-center mb-4">{{ __('Verify Your Email Address') }}</h2>


            <div class="form-footer">
                <button type="submit" class="btn btn-primary w-100">
                    <!-- Download SVG icon from http://tabler-icons.io/i/mail -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                         viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                         stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <rect x="3" y="5" width="18" height="14" rx="2"/>
                        <polyline points="3 7 12 13 21 7"/>
                    </svg>
                    {{ __('click here to request another') }}
                </button>
            </div>
        </div>
    </form>
    <div class="text-center text-muted mt-3">
        Forget it, <a href="{{ route('login') }}">send me back</a> to the sign in screen.
    </div>
@endsection
