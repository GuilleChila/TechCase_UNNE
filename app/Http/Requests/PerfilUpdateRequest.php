<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class PerfilUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    
    public function rules(): array
    {
        $usuarioId = auth()->id();
        return [
            'name'=>'required|string|max:255',
            'email'=> 'required|email|unique:usuarios,correo,' . $usuarioId,
            'current_password' =>'required_with:password|nullable|string',
            'password'=>'nullable|string|min:8|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'name.required'             => 'El nombre completo es obligatorio.',
            'email.required'            => 'El correo electrónico es obligatorio.',
            'email.unique'              => 'Este correo electrónico ya está registrado por otro usuario.',
            'current_password.required_with' => 'Debés ingresar tu contraseña actual para establecer una nueva.',
            'password.min'              => 'La nueva contraseña debe tener al menos 8 caracteres.',
            'password.confirmed'        => 'La confirmación de la nueva contraseña no coincide.',
        ];
    }
}
