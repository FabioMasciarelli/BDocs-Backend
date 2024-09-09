@extends('layouts.app')

@section('content')
<div class="container  ms-register" style="margin-top: 100px;">
    <div class="row justify-content-center">
        <div class="col-6 p-5">
            <div class="card">
                {{-- <div class="card-header">{{ __('Register') }}</div> --}}

                <div class="card-body d-flex align-items-center flex-column">
                    <form method="POST" action="{{ route('register') }}" class="pt-5 px-3" autocomplete="off">
                        @csrf

                        <div class="mb-4 row d-flex justify-content-center">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}*</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row d-flex justify-content-center">
                            <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('Cognome') }}*</label>

                            <div class="col-md-6">
                                <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autocomplete="surname" autofocus>

                                @error('surname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row d-flex justify-content-center">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo E-Mail') }}*</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row d-flex justify-content-center">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}*</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row d-flex justify-content-center">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Conferma Password') }}*</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div id="error-container" class="d-none text-center">
                            <p class="fw-bold bg-danger-subtle text-danger m-auto rounded d-inline-block p-2" id="error-message"></p>
                        </div>

                        <div class="mb-4 row mb-0 d-flex justify-content-center">
                            <div class="col-md-6">
                                <button type="submit" class="register-button">
                                    {{ __('Registrati') }}
                                </button>
                            </div>
                        </div>
                        
                    </form>
                    <small>I campi contrassegnati con * sono obbligatori</small>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection
