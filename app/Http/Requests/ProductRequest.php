<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name_product' => [
                'required',
                'unique:products,name_product',
                'string',
            ],
            'product_slug' => [
                'unique:products,product_slug',
            ],
            'img_product' => [
                'required'
            ],
            'price_product' => [
                'required',
            ] , 
            'description_product' => [
                'required'
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'name_product.required' => 'Tên sản phẩm là bắt buộc.',
            'name_product.unique' => 'Tên sản phẩm đã tồn tại.',
            'name_product.string' => 'Tên sản phẩm phải là chuỗi ký tự.',

            'img_product.required' => 'Hình ảnh sản phẩm là bắt buộc.',

            'price_product.required' => 'Giá sản phẩm là bắt buộc.',

            'description_product.required' => 'Mô tả sản phẩm là bắt buộc.',
        ];
    }
}
