<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'required' => ':attribute khong duoc de trong',
            'min' => ':attribute phai tu 3-20 ky tu',
            'max' => ':attribute phai tu 3-20 ky tu',
            'unique' => ':attribute da duoc su dung',
        ];
    }
    public function attributes()
    {
        return [
            'category_name' => 'Category ten'
        ];
    }
}
