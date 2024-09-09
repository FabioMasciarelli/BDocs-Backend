<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDoctorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'photo' => ['required', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'specialization' => ['required'],
            'performance' => ['required'],
            'phone_number' => ['required', 'string', 'max:15'],
            'studio_address' => ['required', 'string', 'max:255'],
            'CV' => ['required', 'mimes:pdf,doc,docx', 'max:10240'],
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'photo.required' => 'Si prega di inserire la foto',
            'photo.mimes' => 'La foto deve essere in formato jpeg, png, jpg, gif o svg',
            'photo.max' => 'La foto non deve superare i 2048KB',
            'specialization.required' => 'Si prega di inserire almeno una specializzazione',
            'performance.required' => 'Si prega di inserire almeno una prstazione',
            'phone_number.required' => 'Si prega di inserire un numero telefonico',
            'phone_number.max' => 'Il numero telefonico non deve superare i 15 caratteri',
            'studio_address.max' => 'L\'indirizzo dello studio non deve superare i 255 caratteri',
            'CV.required' => 'Si prega di inserire il CV',
            'CV.mimes' => 'Il CV deve essere in formato pdf, doc o docx',
            'CV.max' => 'Il CV non deve superare i 10240KB',
        ];
    }
}
