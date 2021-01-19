<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRecipePost extends FormRequest
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
            'reason'=>'required|string',
            'id_doctor'=>'required',
            'indications'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'reason.required' => 'Este campo es obligatorio',
            'reason.string' => 'El motivo no debe estar vacio.',
            'id_patient.required' => 'Seleccione un paciente',
            'id_doctor.required' => 'Seleccione un doctor',
            'indications.required' => 'Las indicaciones son obligatorio'
        ];
    }
}
