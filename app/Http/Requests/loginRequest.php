<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class loginRequest extends FormRequest
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
            'email' => 'required|email',
            'password' => 'required|string',
        ];
    }
    
    public function messages()
    {
        return [
            'email.required' => 'Email là trường bắt buộc',
            'email.email' => 'Email phải là một địa chỉ email hợp lệ',
            'password.required' => 'Mật khẩu là trường bắt buộc',
            'password.string' => 'Mật khẩu phải là một chuỗi',
        ];
    }
}
