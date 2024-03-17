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
            'category_name' => [
                'required',
                'string',
                'unique:categories,category_name',
            ]
        ];
    }

    public function messages()
    {
        return [
            'category_name.unique' => 'Tên danh mục đã tồn tại trong hệ thống.',
            'category_name.required' => 'Tên danh mục bắt buộc phải nhập.',
            'category_name.string' => 'Tên danh mục phải là chuỗi.',
        ];
    }
}
