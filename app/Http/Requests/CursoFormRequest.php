<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CursoFormRequest extends FormRequest
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
            'nombreP' => 'required|string|max:255',
            // 'nombreA' => 'required|string|max:255',
            'fechaA'=>'required|max:10'
        ];
    }
}
