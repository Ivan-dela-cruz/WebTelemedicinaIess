<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAppointmentPost extends FormRequest
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
            'id_doctor'=>'required',
            'id_specialty'=>'required',
            'reason'=>'required|string',
            'date'=>'required|date',
            'start'=>'required|date',
            'end'=>'required|date',
            'status'=>'required',
        ];
    }
    public function messages()
    {
        return [

            'id_patient.required' => 'Seleccione un paciente',
            'id_doctor.required' => 'Seleccione un doctor',
            'id_specialty.required' => 'Seleccione una epecialidad',
            'reason.required' => 'Este campo es obligatorio',

            'date.required' => 'Seleccione una fecha',
            'date.date' => 'No es un formato válido',
            'start.required' => 'Seleccione hora de inicio',
            'start.date' => 'No es un formato válido',
            'end.required' => 'Seleccione hora de finalización',
            'end.date' => 'No es un formato válido',
            'status.required' => 'Este campo es obligatorio',

        ];
    }
}
