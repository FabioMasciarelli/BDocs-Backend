<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMessageRequest extends FormRequest
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
            'doctor_id' => ['required'],
            'guest_name' => ['required'],
            'guest_surname' => ['required'],
            'guest_mail' => ['required', 'email'],
            'message' => ['required'],
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
            'doctor_id.required' => 'Si prega di inserire un dottore',
            'guest_name.required' => 'Si prega di inserire il proprio nome',
            'guest_surname.required' => 'Si prega di inserire il proprio cognome',
            'guest_mail.required' => 'Si prega di inserire la vostra mail',
            'guest_mail.email' => 'E\' stata inserita una mail non valida',
            'message.required' => 'Si prega di inserire un messaggio',
        ];
    }
}
