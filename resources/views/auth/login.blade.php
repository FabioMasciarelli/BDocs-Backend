@extends('layouts.app')

@section('content')
    <div class="container-login"  style="margin-top: 150px;">
        <div class="row justify-content-center">
            <div class="col-12">
                {{-- <h3 class="card-header">{{ __('Login') }}</h3> --}}

                <div class="card-body form">
                    <form method="POST" action="{{ route('login') }}" autocomplete="off">
                        @csrf

                        <div class="mb-4 row justify-content-evenly align-items-center">
                            <label for="email" class="col-md-4 col-form-label text-md-right ">{{ __('E-Mail') }}</label>

                            <div class="col-md-6 justify-content-center align-items-center">
                                <input id="email" type="email"
                                    class="form-control input @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row justify-content-evenly align-items-center">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6 justify-content-center align-items-center">
                                <input id="password" type="password"
                                    class="form-control input @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- <div class="mb-4 row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        Salva Password
                                    </label>
                                </div>
                            </div>
                        </div> --}}

                        <div class="mb-4 row mb-0 justify-content-center">
                            <div class="col-md-8 md-4 ">
                                <button type="submit" class="login-button">
                                    {{ __('Accedi') }}
                                </button>

                                {{-- @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif --}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
