<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class updateAccountRequest extends FormRequest
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
        if (Auth::guard("hotel")->check()) {
            return [
                //
                'email' => 'email',
                'imagen' => 'image',
                'current_password' => 'nullable|current_password:hotel',
                'confirm_password' => 'same:password'
            ];
        }
        if (Auth::guard("client")->check()) {
            return [
                //
                'email' => 'email',
                'imagen' => 'image',
                'current_password' => 'nullable|current_password:client',
                'confirm_password' => 'same:password'
            ];
        }
        if (Auth::guard("web")->check()) {
            return [
                'email' => 'email',
                'current_password' => 'nullable|current_password:client',
                'confirm_password' => 'same:password'
            ];
        }
    }
    public function messages()
    {
        return [
            'imagen.image' => 'La foto de perfil debe de ser una imagen',
            'email.email' => 'La dirección email introducida no es correcta',
            'current_password.current_password' => 'La contraseña actual no es correcta',
            'confirm_password.same' => "Las contraseñas deben de coincidir"
        ];
    }
}
