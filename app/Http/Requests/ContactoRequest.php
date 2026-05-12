<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ContactoRequest extends FormRequest
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
            'correo'=>'required|email',
            'teléfono'=>'required|size:10',
            'motivo'=> 'required|in:ventas, soporte, envios, otros',
            'mensaje'=>'required|max:500',
        ];
    }
    public function messages(): array{
        return[
            'nombre.required' => 'el nombre es obligatorio',
            'correo.required' => 'El correo electrónico es obligatorio.',
            'correo.email' => 'Por favor, ingresá una dirección de correo válida.',
            'teléfono.required' => 'el número de teléfono es obligatorio',
            'teléfono.' => 'el número de teléfono debe tener exactamente 10 digitos',
            'motivo.required' => 'Por favor, selecciona un motivo de consulta.',
            'motivo.in'=> 'La opción seleccionada no es válida.',
            'detalle-consulta.required'=> 'el detalle de consulta es obligatorio',
        ];
    }
}
