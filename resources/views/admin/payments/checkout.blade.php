@extends('layouts.admin')

@section('content')
    {{-- if success we print the message success and a button to return to the home page --}}
    @if (session('success'))
        <div class="alert alert-success text-center mt-4 custom-success-message">
            {{ session('success') }}
            <a href="{{ route('admin.doctors.index') }}" class="btn btn-primary mt-3">Torna alla home</a>
        </div>
    @endif

    {{-- else we print an error message --}}
    @if (session('error'))
        <div class="alert alert-danger text-center mt-4">
            {{ session('error') }}
        </div>
    @endif

    {{-- form with payment infos --}}
    <form id="checkout-form" action="{{ route('admin.processPayment') }}" method="post"
        class="w-50 m-auto mt-5 p-4 border rounded shadow-sm bg-light">
        @csrf
        <input type="hidden" name="id" value="{{ $sponsorship->id }}">
        <div id="dropin-container" class="mb-3"></div>
        <button type="submit" class="btn btn-primary mt-3">Paga Adesso</button>
    </form>
    </form>

    <script>
        var form = document.querySelector('#checkout-form');
        // generated client token
        var clientToken = "{{ $clientToken }}";
        // console.log(clientToken);

        braintree.dropin.create({
            authorization: clientToken,
            container: '#dropin-container',
            locale: 'it_IT'
        }, function(createErr, instance) {
            form.addEventListener('submit', function(event) {
                event.preventDefault();

                instance.requestPaymentMethod(function(err, payload) {
                    if (err) {
                        console.log('Error:', err);
                        return;
                    }

                    // create the nonce with the inputs
                    var nonceInput = document.createElement('input');
                    nonceInput.setAttribute('type', 'hidden');
                    nonceInput.setAttribute('name', 'payment_method_nonce');
                    nonceInput.setAttribute('value', payload.nonce);
                    form.appendChild(nonceInput);

                    form.submit();
                });
            });
        });
    </script>
@endsection
