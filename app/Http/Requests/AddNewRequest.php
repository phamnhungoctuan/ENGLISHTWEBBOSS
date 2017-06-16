<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AddNewRequest extends Request
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
            'txtTitle' => 'required',
            'txtIntro' => 'required',
            'txtFull'  => 'required',
            'newsImg'  => 'image',
        ];
    }

    public function messages() {
        return [
            'txtTitle.required' => 'Vui lòng nhập tiêu đề',
            'txtIntro.required' => 'Vui lòng nhập trích dẫn',
            'txtFull.required'  => 'Vui lòng nhập nội dung bài đăng',
            'newsImg.image'     => 'Vui lòng chọn đúng định dạng ảnh thumbnail',
        ];
    }
}
