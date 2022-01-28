<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
     * @return arrayphp
     */
    public function rules()
    {
        return [
            'name' => 'required|min:2|max:100',
            'password' => 'required|min:6',
            'email' => 'required|email:rfc,dns|unique:users,email',
            'role' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên người dùng không được để trống',
            'name.min' => 'Tên người dùng không được dưới 2 ký tự',
            'name.max' => 'Tên người dùng không được quá 100 ký tự',
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không đúng dịnh dạng',
            'email.unique' => 'Email đã có người sử dụng',
            'password.required' => 'Mật khẩu không được để trống',
            'password.min' => 'Mật khẩu không được dưới 6 ký tự',
            'phone.required' => 'Số điện thoại không được để trống',
            'phone.min' => 'Số điện thoại phải là 10 số',
            'role.required' => 'Hãy chọn chức vụ'
        ];
    }
}
