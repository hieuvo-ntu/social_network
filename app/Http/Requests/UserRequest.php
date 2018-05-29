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
            'txtlastname'   =>  'required',
            'txtfirstname'  =>  'required',
            'txtemail'      =>  'required|email|unique:users,email',
            'txtpswd'       =>  'required',
            'txtre-pswd'    =>  'required|same:txtpswd'
        ];
    }
    public function messages()
    {
        return [
            'txtlastname.required'   =>  'Chưa nhập họ',
            'txtfirstname.required'  =>  'Chưa nhập tên',
            'txtemail.required'      =>  'Chưa nhập địa chỉ email',
            'txtemail.email'         =>  'Không đúng định dạng email',
            'txtemail.unique'          =>  'Địa chỉ email đã tồn tại',
            'txtpswd.required'       =>  'Mật khẩu không được để trống',
            'txtre-pswd.required'    =>  'Chưa nhập lại mật khẩu',
            'txtre-pswd.same'        =>  'Mật khẩu không khớp'

        ];
    }
}
