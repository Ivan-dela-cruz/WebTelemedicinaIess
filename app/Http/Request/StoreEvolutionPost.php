<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEvolutionPost extends FormRequest
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
            'id_patient'=>'required',
            'description'=>'required|string',
            'id_doctor'=>'required',
            'id_diagnostic'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'description.required' => 'Este campo es obligatorio',
            'description.string' => 'La descripción no debe estar vacio.',
            'id_patient.required' => 'Seleccione un paciente',
            'id_doctor.required' => 'Seleccione un doctor',
            'id_diagnostic.required' => 'Seleccione un diagnóstico',

        ];
    }
}
