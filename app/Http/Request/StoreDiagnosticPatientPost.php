<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDiagnosticPatientPost extends FormRequest
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
            'diagnostic_id'=>'required',
            'description'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'patient_id.required' => 'Seleccione un paciente',
            'diagnostic_id.required' => 'Seleccione un diagnóstico',
            'description.required' => 'La descripción es obligatoria'
        ];
    }
}
