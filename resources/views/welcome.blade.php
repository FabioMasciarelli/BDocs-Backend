@extends('layouts.app')
@section('content')


<div class="jumbotron p-3 bg-light ms-jumbotron">
    <div class="container py-5 mt-4">
        @if (session('message'))
        <div class="alert alert-success alert alert-success alert-dismissible fade show p-3 m-0">
            {{ session('message') }}
        </div>
        @endif
        <h1 class="display-5 fw-bold text-center text-white ms-text ms-welcome-title">
            Benvenuto nella Dashboard di B-Doctor
        </h1>
        <p class=" text-center text-white ms-text" style="font-size: 25px; font-weight: 900;">Scegli una delle opzioni</p>
        <div class="d-flex justify-content-center ms-margin-card flex-wrap flex-md-nowrap">
            <div class="card rounded-4 ms-card mt-5 " style="width: 18rem;">
                <div class="card-body text-center d-flex flex-column align-items-center justify-content-between">
                    {{-- <h5 class="card-title">Login</h5> --}}
                    <p class="card-text">Effettua il Login alla Dashboard per gestire al meglio il tuo profilo e
                        visualizzare messaggi e recensioni</p>
                    <a href="{{ route('login') }}" class="btn btn-primary w-75">{{ __('Accedi') }}</a>
                </div>
            </div>
            <div class="card rounded-4 ms-card mt-5" style="width: 18rem;">
                <div class="card-body text-center d-flex flex-column align-items-center justify-content-between">
                    {{-- <h5 class="card-title">Registrati</h5> --}}
                    <p class="card-text">Registrati gratuitamente alla Dashboard per gestire al meglio il tuo profilo e
                        visualizzare messaggi e recensioni</p>
                    <a href="{{ route('register') }}" class="btn btn-primary w-75">{{ __('Registrati') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <div class="content">
        <div class="container">
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempora temporibus, dicta nemo aliquam totam nisi
                deserunt soluta quas voluptatum ab beatae praesentium necessitatibus minus, facilis illum rerum officiis
                accusamus dolores!</p>
        </div>
    </div> --}}
    
@endsection