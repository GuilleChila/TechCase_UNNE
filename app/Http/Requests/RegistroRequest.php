<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class RegistroRequest extends FormRequest
{
    protected $errorBag = 'register';
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
            'name' => 'required|string|max:150',
            'documento' => 'required|size:8|unique:usuarios,documento',
            'email' => 'required|email|unique:usuarios,correo',
            'password' => 'required|min:8|confirmed'
        ];
    }
    public function messages(): array{
        return [
        'name.required' => 'Este campo es obligatorio.',
        'name.max' => 'Máximo de 150 caracteres.',
        'documento.required' => 'Este campo es obligatorio.',
        'documento.size' => 'El DNI debe tener exactamente 8 digitos.',
        'email.unique' => 'Este correo electrónico ya está registrado por otro usuario.',
        'email.required' => 'Este campo es obligatorio.',
        'email.email' => 'Por favor, ingresá una dirección de correo válida.',
        'password.required' => 'Este campo es obligatorio.',
        'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
        'password.confirmed' => 'Las contraseñas no coinciden, por favor verificalas.'
        ];
    }
}
