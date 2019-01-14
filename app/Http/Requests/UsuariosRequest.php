<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuariosRequest extends FormRequest
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
            'nombre_usuario' => 'required|string|max:25',
            'nombres' => 'required|string|max:200',
            'apellidos' => 'required|string|max:200',
            'email_user' => 'required|string|email|max:255',
            'password' => 'required|string|min:6|confirmed',
        ];
    }

    public function attributes()
    {
        return [
            'nombre_usuario' => 'nombre de usuario', 
            'nombres' => 'nombre', 
            'apellidos' => 'Apellido', 
            'email_user' => 'email',
            'password' => 'password', 
        ];
    }
}
