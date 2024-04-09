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
                'min:3',
                'max:30',
                'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
            ],
            'password' => [
                'required',
                'string',
                'min:6',
                'max:10',
            ],
            'name' => [
                'required',
            ],
            'phone' => [
                'required',
                'min:10',
                'numeric',
            ],
            'address' => [
                'required',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Email là trường bắt buộc',
            'email.email' => 'Email phải là một địa chỉ email hợp lệ',
            'email.unique' => 'Email đã tồn tại trong hệ thống',
            'email.min' => 'Email phải có ít nhất 3 ký tự',
            'email.max' => 'Email không được vượt quá 30 ký tự',
            'email.regex' => 'Email không đúng định dạng',
            'password.required' => 'Mật khẩu là trường bắt buộc',
            'password.string' => 'Mật khẩu phải là một chuỗi',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự',
            'password.max' => 'Mật khẩu không được vượt quá 10 ký tự',
            'name.required' => 'Tên là trường bắt buộc',
            'phone.required' => 'Số điện thoại là trường bắt buộc',
            'phone.min' => 'Số điện thoại phải có ít nhất 10 chữ số',
            'phone.numeric' => 'Số điện thoại phải là số',
            'address.required' => 'Địa chỉ là trường bắt buộc',
        ];
    }
}
