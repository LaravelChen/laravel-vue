<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRegisterRequest extends FormRequest
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

    public function messages()
    {
        return [
            'name.unique'=>'name已存在',
            'name.required'=>'name不能为空',
            'email.required'=>'邮箱不能为空',
            'email.email'=>'邮箱必须为邮箱格式',
            'password.required'=>'密码不能为空',
            'password.min'=>'密码不能少于6个字符',
            'password.max'=>'密码不能大于15个字符',
            'password.confirmed'=>'密码不一致',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required|min:1|unique:users,name',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:6|confirmed|max:15',
            'password_confirmation'=>'required|min:6|max:15',
        ];
    }
}
