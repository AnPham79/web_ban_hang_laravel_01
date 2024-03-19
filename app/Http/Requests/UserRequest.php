<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'email' => [
                'required',
                'email',
                'unique:users,email',
            ],
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/',
            ],
            'name' => [
                'required'
            ],
            'phone' => [
                'required',
                'min:10',
                'numeric'
            ],
            'address' => [
                'required'
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Email là trường bắt buộc',
            'email.email' => 'Email phải là một địa chỉ email hợp lệ',
            'email.unique' => 'Email đã tồn tại trong hệ thống',
            'password.required' => 'Mật khẩu là trường bắt buộc',
            'password.string' => 'Mật khẩu phải là một chuỗi',
            'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự',
            'password.regex' => 'Mật khẩu phải chứa ít nhất một chữ thường, một chữ hoa, một số, và một ký tự đặc biệt',
            'name.required' => 'Tên là trường bắt buộc',
            'phone.required' => 'Số điện thoại là trường bắt buộc',
            'phone.min' => 'Số điện thoại phải có ít nhất 10 chữ số',
            'phone.numeric' => 'Số điện thoại phải là số',
            'address.required' => 'Địa chỉ là trường bắt buộc',
        ];
    }
}
