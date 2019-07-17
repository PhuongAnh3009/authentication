<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Validator;

class CategoryRequest extends FormRequest
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
            'category_name' => 'required|min:3|max:20|unique:categories,category_name'
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute must be fill',
            'min' => ':attribute at least 3 character',
            'max' => ':attribute max is 20 character',
            'unique' => ':attribute used before',
        ];
    }

    public function attributes()
    {
        return [
            'category_name' => 'Category'
        ];
    }
}
