<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDiagnosticPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'code' => 'unique:diagnostics|required',
            'name' => 'unique:conceptos|required|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/u',
            'description' => 'required|string',
            'status' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'code.unique' => 'El código ya existe',
            'code.required' => 'Este campo es obligatorio',
            'name.unique' => 'El nombre ya existe',
            'name.regex' => 'El campo solo acepta letras.',
            'name.required' => 'Este campo es obligatorio',
            'description.string' => 'El campo solo acepta letras.',
            'description.required' => 'Este campo es obligatorio',
            'status.required' => 'Este campo es obligatorio',

        ];
    }
}
