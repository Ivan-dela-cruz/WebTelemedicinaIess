<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTypeVoucherPut extends FormRequest
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
            'document'=>[Rule::unique('type_vouchers')->ignore($this->id),'required','regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/u'],
            'abbreviation'=>[Rule::unique('type_vouchers')->ignore($this->id),'required','regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/u'],
            'serie'=>'required|string',
            'start'=>'required|integer',
            'end'=>'required|integer',
            'status'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'document.unique' => 'El documento ya existe',
            'document.regex' => 'El campo solo acepta letras.',
            'abbreviation.unique' => 'La abrebiatura ya existe',
            'abbreviation.regex' => 'El campo solo acepta letras.',
            'serie.required' => 'Este campo es obligatorio',
            'serie.string' => 'Ingrese un dato válido.',
            'start.required' => 'Este campo es obligatorio',
            'start.integer' => 'Debe ser un número entero.',
            'end.required' => 'Este campo es obligatorio',
            'end.integer' => 'Debe ser un número entero.',
            'status.required' => 'Este campo es obligatorio',

        ];
    }
}
