<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class comprobanteRequest extends FormRequest
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
            'comprobante' => 'required|numeric',
        ];
    }

    public function attributes()
    {
        return [
            'nombre_usuario' => 'nombre de usuario', 
            'comprobante' => 'comprobante', 
        ];
    }
}
