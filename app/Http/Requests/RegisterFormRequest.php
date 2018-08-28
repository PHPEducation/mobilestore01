<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterFormRequest extends FormRequest
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
            'name' => 'required|min:3',
            'email' => 'required|min:3|unique:users',
            'password' => 'required|min:3',
            'password_confirm' => 'required|min:3|same:password',
            'phone' => 'required|min:10',
            'address' => 'required|min:4',
            'role' => 'required'
        ];
    }
}
