<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAllergyPatientPost extends FormRequest
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
            'patient_id'=>'required',
            'allergy_id'=>'required',
            'description'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'patient_id.required' => 'Seleccione un paciente',
            'allergy_id.required' => 'Seleccione una alergía',
            'description.required' => 'La descripción es obligatoria'
        ];
    }
}
