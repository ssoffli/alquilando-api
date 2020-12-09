<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUsuarioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre'=>'required|max:255', 
            'apellido'=>'required|max:255', 
            'email'=>'required|max:255|email|unique:usuarios,email', 
            'usuario'=>'required|unique:usuarios,usuario'
        ];
    }
}
