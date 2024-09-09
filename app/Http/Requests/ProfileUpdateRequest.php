<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'la casella del nome non può essere vuota',
            'name.string' => 'il nome non può contenere caratteri speciali',
            'name.max' => 'il nome è troppo lungo, inserirne uno più corto',
            'email.required' => 'la casella mail non può essere vuota',
            'email.lowercase' => 'la mail non può contenere lettere maiuscole',
            'email.email' => 'mail non valida',
            'email.max' => 'la mail è troppo lunga, inserirne una più corta',
            'email.unique' => 'la mail è già registrata'
        ];
    }
}
