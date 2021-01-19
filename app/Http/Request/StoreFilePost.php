<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFilePost extends FormRequest
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
            'name'=>'required|string',
            'type'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Este campo es obligatorio',
            'name.string' => 'La descripción no debe estar vacio.',
            'type.required' => 'El archivo es obligatorio.',
            'id_patient.required' => 'Seleccione un paciente'
        ];
    }
}
