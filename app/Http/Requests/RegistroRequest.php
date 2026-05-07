<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class RegistroRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nombre' => 'required|string|max:150',
            'documento' => 'required|size:7',
            'email.email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ];
    }
    public function messages(): array{
        'nombre.required' => 'Este campo es obligatorio',
        'nombre.max' => 'Máximo de 150 caracteres'
        'documento.required' => 'Este campo es obligatorio'
        'documento.size' => 'el DNI debe tener exactamente 7 digitos'

    }
}
