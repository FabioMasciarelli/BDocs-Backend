@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="container mt-5">

        @if (session('message'))
        <div class="alert alert-success mt-5">
            {{ session('message') }}
        </div>
        @endif
        <h1 class="mb-4 text-light text-center">Lista delle Sponsorizzazioni</h1>

        <div class="row">
            @foreach ($sponsorships as $sponsorship)
            <div class="col-md-4" id="card-container">
                <div class="card mb-4 p-5" id="{{ $sponsorship->name }}">
                    <div class="card-body">
                        <h5 class="card-title text-center border-bottom pb-2" style="    font-weight: bold;
    font-size: 37px;">{{ $sponsorship->name }}</h5>
                        <p class="card-text text-center mt-3"><strong>Prezzo:</strong> {{ number_format($sponsorship->price, 2) }} €</p>
                        <p class="card-text text-center"><strong>Durata:</strong> {{ $sponsorship->duration }} ore</p>
                    </div>
                    <form action="{{ route('admin.sponsorships.store') }}" method="POST" class="d-flex justify-content-center mt-3">
                        @csrf
                        <input type="hidden" name="sponsorship_id" value="{{ $sponsorship->id }}">
                        <button type="submit" class="btn btn-primary" id="SponsorBtn">Attiva Sponsorizzazione</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</div>

@endsection