@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form class="card card-md" method="POST" action="{{ route('password.confirm') }}">
                    @csrf
                    <div class="card-body">
                        {{ __('Please confirm your password before continuing.') }}
                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Password') }}</label>

                            <input id="password" type="password"
                                   class="form-control @error('password') is-invalid @enderror" name="password" required
                                   autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                        </div>

                        <div class="form-footer">

                            <button type="submit" class="btn btn-primary w-100">
                                {{ __('Confirm Password') }}
                            </button>
                        </div>

                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
