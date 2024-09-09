@extends('layouts.admin')

@section('content')
    <div class="container mt-5">

        <h1 class="text-white text-center">Lista delle recensioni</h1>
        <table class="table mt-5 table-hover table-custom">
        @if ($reviews)
            <thead>

                <tr>
                    <th scope="col" class="text-center align-middle">Nome</th>
                    <th scope="col" class="text-center align-middle">Email</th>
                    <!-- <th scope="col">Messaggio</th> -->
                    <th scope="col" class="text-center align-middle">Data</th>
                    <!-- <th scope="col">Stato</th> -->
                    <th scope="col" class="text-center align-middle">Azioni</th>
                </tr>

            </thead>
            <tbody>
              
                    
                @foreach ($reviews as $review)
                    <tr>
                        <td scope="col" class="text-center align-middle">{{ ucfirst(strtolower($review->guest_name)) }}</td>
                        <td class="text-center align-middle">{{ $review->guest_mail }}</td>
                        <!-- <td>{{ $review->review }}</td> -->
                        <td class="text-center align-middle">{{ ucfirst(strtolower($review->created_at->format('d-m-Y H:i'))) }}</td>
                        <td class="text-center align-middle">
                            <div class="d-flex justify-content-center align-items-center gap-2">
                                <a href="{{ route('admin.reviews.show', ['review' => $review->id]) }}"
                                    class="btn btn-outline-info" title="Dettagli">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
               
                
                   
            </tbody>
        </table>
       @else
                <p class="text-center text-light">Nessuna recensione ricevuta</p>
                @endif
        </div>
    @endsection
