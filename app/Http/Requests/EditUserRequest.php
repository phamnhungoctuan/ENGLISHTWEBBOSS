<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EditUserRequest extends Request
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
            'txtusername' => 'required',
            'txtpassword' => 'required',
            'txtemail'    => 'required|email'
        ];
    }

    public function messages()
    {
        return [
            'txtusername.required' => 'Vui lòng nhập họ tên người dùng',
            'txtpassword.required' => 'Vui lòng nhập mật khẩu',
            'txtemail.email'       => 'Vui lòng nhập đúng định dạng email',
            'txtemail.required'    => 'Vui lòng nhập email'
        ];
    }
}
