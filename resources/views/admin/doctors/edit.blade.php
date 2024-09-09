@extends('layouts.admin')

@section('content')
{{-- CONTAINER --}}
<div class="container mt-5">
    <h1 class="text-center text-light mb-4">Modifica il tuo profilo</h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{-- FORM --}}
            @if (isset($doctor))
            <form action="{{ route('admin.doctors.update', $doctor->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- PHOTO --}}
                <div class="mb-3">
                    <label for="photo" class="form-label text-info">Inserisci una foto *</label>
                    <input name="photo" type="file" id="photo" class="form-control @error('photo') is-invalid @enderror" onchange="previewImage(event)">
                    @error('photo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                {{-- /PHOTO --}}

                {{-- SPECIALIZATIONS --}}
                <div class="mb-3">
                    <label for="specialization" class="form-label text-info">Specializzazioni *</label>
                    <select name="specialization[]" id="specialization" class="form-select @error('specialization') is-invalid @enderror d-none" multiple>
                        @foreach ($specializations as $specialization)
                        <option @selected(in_array($specialization->id, old('specialization', $doctor->specializations->pluck('id')->toArray()))) value="{{ $specialization->id }}">
                            {{ $specialization->title }}
                        </option>
                        @endforeach
                    </select>
                    @error('specialization')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                {{-- /SPECIALIZATIONS --}}

                {{-- PERFORMANCES --}}
                <div class="mb-3">
                    <label for="performance" class="form-label text-info">Prestazioni *</label>
                    <input type="text" name="performance" id="performance" class="form-control @error('performance') is-invalid @enderror" value="{{ old('performance', $doctor->performance) }}">
                    @error('performance')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                {{-- /PERFORMANCES --}}

                {{-- PHONE NUMBER --}}
                <div class="mb-3">
                    <label for="phone_number" class="form-label text-info">Numero di telefono *</label>
                    <input type="tel" name="phone_number" id="phone_number" class="form-control @error('phone_number') is-invalid @enderror" value="{{ old('phone_number', $doctor->phone_number) }}">
                    @error('phone_number')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                {{-- /PHONE NUMBER --}}

                {{-- STUDIO ADDRESS --}}
                <div class="mb-3">
                    <label for="studio_address" class="form-label text-info">Indirizzo studio *</label>
                    <input type="text" name="studio_address" id="studio_address" class="form-control @error('studio_address') is-invalid @enderror" value="{{ old('studio_address', $doctor->studio_address) }}">
                    @error('studio_address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                {{-- /STUDIO ADDRESS --}}

                {{-- CV --}}
                <div class="mb-3">
                    <label for="CV" class="form-label text-info">Allega il tuo CV *</label>
                    <input name="CV" type="file" id="CV" class="form-control @error('CV') is-invalid @enderror" onchange="previewCV(event)">
                    @error('CV')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                {{-- /CV --}}

                <button type="submit" class="btn btn-primary ">Salva</button>
            </form>
            {{-- /FORM --}}
            @else
            <p>Il profilo del dottore non è stato trovato.</p>
            @endif
        </div>

        <div class="col-md-4">
            {{-- PHOTO PREVIEW --}}
            <div class="mb-3">
                @if ($doctor->photo)
                <img class="doctor-photo img-thumbnail" id="photo-preview" src="{{ $doctor->photo ? asset('storage/' . $doctor->photo) : '' }}" alt="Doctor Photo">
                @else
                <p>Nessuna immagine di copertina presente</p>
                @endif
            </div>
            {{-- /PHOTO PREVIEW --}}

            {{-- CV PREVIEW --}}
            <div class="mb-3">
                @if ($doctor->CV)
                <embed class="doctor-cv" id="cv-preview" src="{{ $doctor->CV ? asset('storage/' . $doctor->CV) : '' }}" type="application/pdf">
                @else
                <p>Nessun CV presente</p>
                @endif
            </div>
            {{-- /CV PREVIEW --}}
        </div>
    </div>
    <p class="text-light mt-3">* questi sono obbligatori</p>
</div>
{{-- /CONTAINER --}}

{{-- SCRIPT FOR MULTISELECT --}}
<script>
    // https://github.com/habibmhamadi/multi-select-tag
    new MultiSelectTag('specialization', {
        rounded: true,
        shadow: false,
        placeholder: 'Search',
        tagColor: {
            textColor: '#327b2c',
            borderColor: '#92e681',
            bgColor: '#eaffe6',
        },
        onChange: function(values) {
            console.log(values)
        }
    });
</script>
{{-- /SCRIPT FOR MULTISELECT --}}
@endsection
