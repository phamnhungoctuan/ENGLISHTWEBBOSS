<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EditNewsRequest extends Request
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
            'sltCate'   => 'required',
            'txtTitle'  => 'required',
            'txtIntro'  => 'required',
            'txtFull'   => 'required',
            'newsImg'   => 'image'
        ];
    }

    public function messages () 
    {
        return [
            'sltCate.required'   => 'Vui lòng chọn danh mục',
            'txtTitle.required'  => 'Vui lòng chọn tiêu đề',
            'txtIntro.required'  => 'Vui lòng nhập tóm tắt tin',
            'txtFull.required'   => 'Vui lòng nhập nội dung tin',
            'newsImg.image'      => 'Đây phải là định dạng hình'
        ];
    }
}
