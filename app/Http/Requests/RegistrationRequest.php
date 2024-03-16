<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegistrationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email:filter'],
            'password' => ['required', 'confirmed', Password::default()],
            'agreement' => ['accepted']
        ];
    }
}
