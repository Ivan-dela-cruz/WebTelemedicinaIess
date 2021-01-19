<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserPut extends FormRequest
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
            'ci' => ['required','digits:10', 'numeric', Rule::unique('users')->ignore($this->id)],
            'name'=>'required|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/u|max:255',
            'last_name'=>'required|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/u|max:255',

            'address'=>'required|string|max:255',

            'phone'=>'required||numeric|digits:10',
            'email'=>['required','email','max:255',Rule::unique('users')->ignore($this->id)],
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
            'address.required'=>'Este campo es obligatorio.',
            'phone.required'=> 'Este campo es obligatorio.',
            'phone.numeric'=> 'Este campo debe contener solo números.',
            'phone.digits'=> 'Este campo debe contener al menos 10 dígitos ',
            'email.email' =>'No es un correo válido.',
            'email.unique' => 'El correo del usuario ya está en uso.',
            'email.required' => 'El correo del usuario es obligatorio.',
            //'password.min' => 'La contraseña debe contener al menos 8 carácteres',
            //'password.required' => 'La contraseña es obligatoria',
        ];
    }
}
