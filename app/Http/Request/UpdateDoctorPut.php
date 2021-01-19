<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateDoctorPut extends FormRequest
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

        //name, last_name,username,birth_date, gender, address, province, city, phone, url_image, email, password, status
        return [
            'ci' => ['required','digits:10', 'numeric', Rule::unique('doctors')->ignore($this->id)],
            'name' => 'required|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/u|max:255',
            'last_name' => 'required|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/u|max:255',
            'birth_date' => 'date',
            'gender' => 'required',
            'address' => 'required|string|max:255',
            'province' => 'required|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/u|max:255',
            'city' => 'required|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/u|max:255',
            'phone' => 'required||numeric|digits:10',
            'email'=>['required','email','max:255',Rule::unique('doctors')->ignore($this->id)],
            'academic_title'=>'regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/u',
            'graduation_date'=>'date',
            'id_specialty'=>'required'
            //'password'=>'required|string|min:8'
        ];
    }
    public function messages()
    {
        return [
            'ci.unique' => 'El usuario ya existe',
            'ci.digits' => 'El número debe contener 10 carácteres',
            'ci.required' => 'Este campo es obligatorio',
            'ci.numeric' => 'El campo solo acepta números',
            'name.required' => 'Este campo es obligatorio.',
            'name.regex' => 'Este campo debe contener solo letras.',
            'last_name.required' => 'Este campo es obligatorio.',
            'last_name.regex' => 'Este campo debe contener solo letras.',
            'birth_date.date' => 'Ingrese una fecha valida',
            'gender.required' => 'Este campo es obligatorio.',
            'address.required' => 'Este campo es obligatorio.',
            'province.required' => 'Este campo es obligatorio.',
            'province.regex' => 'Este campo debe contener solo letras.',
            'city.required' => 'Este campo es obligatorio.',
            'city.regex' => 'Este campo debe contener solo letras.',
            'phone.required' => 'Este campo es obligatorio.',
            'phone.numeric' => 'Este campo debe contener solo números.',
            'phone.digits' => 'Este campo debe contener al menos 10 dígitos ',
            'email.email' => 'No es un correo válido.',
            'email.unique' => 'El correo del usuario ya está en uso.',
            'email.required' => 'El correo del usuario es obligatorio.',
            'academic_title.regex' => 'Este campo debe contener solo letras.',
            'graduation_date.date' => 'Ingrese una fecha valida',
            'id_specialty.required' => 'Este campo es obligatorio.',
        ];
    }
}
