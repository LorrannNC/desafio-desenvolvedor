<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email'     => 'required|email',
            'password'  => 'required',
        ];
    }

    /**
     * Get customized validation messages according to attributes.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'required'  => 'Campo obrigatório',
            'email'     => 'Por favor, digite um email válido',
        ];
    }
}
