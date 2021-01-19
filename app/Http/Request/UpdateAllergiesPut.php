<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAllergiesPut extends FormRequest
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
            'name'=>[Rule::unique('allergies')->ignore($this->id),'required','regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/u'],
            'description'=>'required|string',
           
        ];
    }
    public function messages()
    {
        return [
            'name.unique' => 'La alergía ya existe',
            'name.regex' => 'El campo solo acepta letras.',
            'name.required' => 'Este campo es obligatorio',
            'description.string' => 'El campo solo acepta letras.',
            'description.required' => 'Este campo es obligatorio',
            'status.required' => 'Este campo es obligatorio',

        ];
    }
}
