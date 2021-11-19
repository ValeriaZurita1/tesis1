<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserFormRequest extends FormRequest
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
            'name' => 'required|regex:/^[\pL\s\-]+$/u',
            'apellido' => 'required|regex:/^[\pL\s\-]+$/u',
            'direccion' => 'required|string|max:255',
            'telefono' => 'nullable|numeric|min:10',
            'celular' => 'nullable|numeric|min:10',
            'email' => 'required|string|email|max:255|unique:users',
            'estado'=>'required|max:1',
            'password' => 'required|string|min:6|confirmed'
        ];
    }
}
