@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <h1 class="text-center text-light">Dettaglio della Messaggio</h1>
    <div class="card card-message mt-3 shadow-sm" style="width: 80%; margin:0 auto;">
    <div class="card-body">
              <div class="d-flex  border-bottom justify-content-between align-items-center">
                <h5 class="card-title my_name"> <i class="fa-solid fa-circle-user"></i> {{ $message->guest_name }} </h5>
                <span class="text-secondary" style="font-size: 12px;">  {{ ucfirst(strtolower($message->created_at->format('d-m-Y H:i'))) }}</span>
              </div>
              <p class="mt-0">Da: {{$message->guest_mail}}</p>
              <h6>Ha scritto</h6>
              <p class="card-text">
                "{{ $message->message }}".
              </p>
        </div>
    </div>
</div>
@endsection
