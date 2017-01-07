<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersLoginRequest extends FormRequest
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
            'email.required'=>'邮箱不能为空',
            'email.email'=>'邮箱必须为邮箱格式',
            'password.required'=>'密码不能为空',
            'password.min'=>'密码不能少于6个字符',
            'password.max'=>'密码不能大于15个字符',
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
            'email'=>'required|email',
            'password'=>'required|min:6|max:15',
        ];
    }
}
