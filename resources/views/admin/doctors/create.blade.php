@extends('layouts.admin')

@section('content')
<h1 class="text-center mt-2 text-light">Crea il tuo profilo</h1>



{{-- CONTAINER --}}
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{-- FORM --}}
            <form action="{{ route('admin.doctors.store') }}" method="POST" enctype="multipart/form-data" >
                @csrf

                {{-- PHOTO --}}
                <div class="mb-3 w-100">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label for="photo" class="form-label text-info">Inserisci una foto *</label>
                            <input name="photo" type="file" id="photo" class="form-control @error('photo') is-invalid @enderror" value="{{ old('photo') }}" style="border-radius: 5px; background: #f7f7f7; text-align: center;" accept="image/*" onchange="previewImage(event)">
                            @error('photo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                {{-- /PHOTO --}}

                {{-- SPECIALIZATIONS --}}
                <div class="d-flex justify-content-around gap-3">
                    <div class="mb-3 w-100">
                        <label for="specialization" class="form-label text-info">Specializzazioni *</label>
                        <select name="specialization[]" id="specialization" class="form-control @error('specialization') is-invalid @enderror d-none" multiple>
                            @foreach ($specializations as $specialization)
                            <option @selected(in_array($specialization->id, old('specialization', []))) value="{{ $specialization->id }}">
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
                    <div class="mb-3 w-100">
                        <label for="performance" class="form-label text-info">Prestazioni *</label>
                        <input type="text" name="performance" id="performance" class="form-control @error('performance') is-invalid @enderror" value="{{ old('performance') }}">
                        @error('performance')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                {{-- /PERFORMANCES --}}

                {{-- PHONE NUMBER --}}
                <div class="d-flex justify-content-around gap-3">
                    <div class="mb-3 w-100">
                        <label for="phone_number" class="form-label text-info">Numero di telefono *</label>
                        <input type="tel" name="phone_number" id="phone_number" class="form-control @error('phone_number') is-invalid @enderror" value="{{ old('phone_number') }}" style="border-radius: 5px; background: #f7f7f7;">
                        @error('phone_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    {{-- /PHONE NUMBER --}}

                    {{-- STUDIO ADDRESS --}}
                    <div class="mb-3 w-100">
                        <label for="studio_address" class="form-label text-info">Indirizzo studio *</label>
                        <input type="text" name="studio_address" id="studio_address" class="form-control @error('studio_address') is-invalid @enderror" value="{{ old('studio_address') }}">
                        @error('studio_address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                {{-- /STUDIO ADDRESS --}}

                {{-- CV --}}
                <div class="mb-3 w-100">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label for="CV" class="form-label text-info">Allega il tuo CV *</label>
                            <input name="CV" type="file" id="CV" class="form-control @error('CV') is-invalid @enderror" style="border-radius: 5px; background: #f7f7f7; text-align: center;" accept="application/pdf" onchange="previewCV(event)">
                            @error('CV')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                {{-- /CV --}}
                <button type="submit" class="btn btn-primary">Salva</button>
            </form>
            {{-- /FORM --}}
        </div>

        <div class="col-md-4">
            {{-- PHOTO PREVIEW --}}
            <div class="mb-3">
                <img class="d-none doctor-photo img-thumbnail" id="photo-preview" src="" alt="Anteprima Foto" style="max-width: 100%; height: auto; object-fit: cover;">
            </div>
            {{-- CV PREVIEW --}}
            <div class="mb-3">
                <embed class="d-none doctor-cv" id="cv-preview" src="" type="application/pdf" style="max-width: 100%; height: 200px; object-fit: contain;">
            </div>
        </div>
    </div>
    <p class="text-light">* questi sono obbligatori</p>
</div>
{{-- /CONTAINER --}}

{{-- SCRIPT FOR MULTISELECT --}}
<script>
    // https://github.com/habibmhamadi/multi-select-tag
    new MultiSelectTag('specialization', {
        rounded: true, // default true
        shadow: false, // default false
        placeholder: 'Search', // default Search...
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