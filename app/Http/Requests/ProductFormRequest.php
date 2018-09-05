<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
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
            'name' => 'required|min:3|max:191|unique:products',
            'price' => 'required',
            'category' => 'required',
            'description' => 'required|min:3|max:191',
            'ram' => 'required',
            'hard_disk' => 'required|min:3|max:191',
            'cpu' => 'required',
            'operating_system' => 'required|min:3|max:191',
            'pin' => 'required|min:3|max:191',
            'screen' => 'required|min:3|max:191',
            'images' => 'required',
            'qty' => 'required'
        ];
    }
}
