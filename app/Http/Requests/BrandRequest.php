<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
            'brand_name' => [
                'required',
                'string',
                'unique:brands,brand_name',
            ]
        ];
    }

    public function messages()
    {
        return [
            'brand_name.unique' => 'Tên thương hiệu đã tồn tại trong hệ thống.',
            'brand_name.required' => 'Tên thương hiệu bắt buộc phải nhập.',
            'brand_name.string' => 'Tên thương hiệu phải là chuỗi.',
        ];
    }
}
