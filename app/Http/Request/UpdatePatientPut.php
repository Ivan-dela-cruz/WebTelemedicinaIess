<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePatientPut extends FormRequest
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
            'ci' => ['required', 'digits:10', 'numeric', Rule::unique('patients')->ignore($this->id)],
            'name' => 'required|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/u|max:255',
            'last_name' => 'required|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/u|max:255',
            'birth_date' => 'date',
            'gender' => 'required',
            'address' => 'required|string|max:255',
            'province' => 'required|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/u|max:255',
            'city' => 'required|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/u|max:255',
            'phone' => 'required||numeric|digits:10',
            //'phone_2' => 'numeric|digits:10',
            'email' => ['required', 'email', 'max:255', Rule::unique('patients')->ignore($this->id)],
            'job' => 'regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/u',
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
            'username.required' => 'Este campo es obligatorio.',
            'username.unique' => 'Este nombre ya esta en uso.',
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

            'phone_2.numeric' => 'Este campo debe contener solo números.',
            'phone_2.digits' => 'Este campo debe contener al menos 10 dígitos ',

            'email.email' => 'No es un correo válido.',
            'email.unique' => 'El correo del usuario ya está en uso.',
            'email.required' => 'El correo del usuario es obligatorio.',
            'job.regex' => 'Este campo debe contener solo letras.',
            //'password.min' => 'La contraseña debe contener al menos 8 carácteres',
            //'password.required' => 'La contraseña es obligatoria',
        ];
    }
}
