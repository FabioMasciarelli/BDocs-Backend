@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h1 class="text-white text-center">Lista Messaggi ricevuti</h1>
   @if ($messages)
       
 
            <div class="row">
                <table class="table mt-5 table-hover table-custom">
                    <thead>
                        <tr>

                            <th scope="col" class="text-center align-middle">Nome</th>
                            <th scope="col" class="text-center align-middle">Cognome</th>
                            <th scope="col" class="text-center align-middle">E-mail</th>
                            <th scope="col" class="text-center align-middle">Data</th>
                            <th scope="col" class="text-center align-middle">Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($messages as $message)
                            <tr>

                                <td class="text-center align-middle">{{ ucfirst(strtolower($message->guest_name)) }}</td>
                                <td class="text-center align-middle">{{ ucfirst(strtolower($message->guest_surname)) }}</td>
                                <td class="text-center align-middle">{{ ucfirst(strtolower($message->guest_mail)) }}</td>
                                <td class="text-center align-middle">
                                    {{ \Carbon\Carbon::parse($message->created_at)->format('d-m-Y H:i') }}</td>
                                <td class="text-center align-middle">
                                    <div class="d-flex justify-content-center align-items-center gap-2">
                                        <a href="{{ route('admin.messages.show', ['message' => $message->id]) }}"
                                            class="btn btn-outline-info">
                                            <i class="fa-solid fa-eye"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <p class="text-center text-light">Nessun messaggio ricevuto</p>
            </div>
           
            @endif
        
    </div>
@endsection
