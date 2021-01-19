<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMedicalProcedurePost extends FormRequest
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
            'category' => 'required|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/u',
            'name' => 'unique:medical_procedures|required|string',
            'description' => 'required|string',
            'price' => 'required',
            'id_reference' => 'required',
            'id_concept' => 'required',
            'status' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'category.regex' => 'El campo solo acepta letras.',
            'category.required' => 'Este campo es obligatorio',
            'name.unique' => 'El nombre ya existe',
            'name.string' => 'El campo no debe estar vacío.',
            'name.required' => 'Este campo es obligatorio',
            'description.string' => 'El campo solo acepta letras.',
            'description.required' => 'Este campo es obligatorio',
            'id_reference.required' => 'Seleccione una referencia',
            'id_concept.required' => 'Seleccione una un concepto',
            'status.required' => 'Este campo es obligatorio',
            'price.required' => 'Este campo es obligatorio.',
             'price.numeric' => 'El valor no es válido.',
            'price.between' => 'El precio no es válido.',

        ];
    }
}
