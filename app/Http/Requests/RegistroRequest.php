<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistroRequest extends FormRequest
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
            //
            'nombre' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed'],
            'email' => ['unique:clients,email','unique:hotels,email','required', 'email']
        ];
    }
    public function messages(){
        return [
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.max' => 'La longitud de nombre ha excedido la máxima permitida (255 caracteres).',
            'password.required' => 'La contraseña es obligatoria.',
            'password.confirmed' => 'La contraseña no coincide.',
            'email.required' => 'El correo electronico es obligatorio',
            'email.email' => 'El email introducido no es correcto',
            'email.unique' => 'Ya existe un usuario registrado con esa dirección de email'
        ];
    }
}
