<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name'=>'required|max:200',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:3|same:password_confirmation',
            'phone'=>'required',
            'address'=>'required',
            'role'=>'required',
            // 'password_confirmation'=>'confirmed'
        ];
    }
    public function messages()
    {
        return [
            'required'=>':attribute không được để trống',
            'name.max'=>'Nhập quá ký tự cho phép',
            'password.min'=>'Mật khẩu nhập nhỏ hơn 3 ký tự',
            'email.email'=>'Nhập không đúng định dạng email',
            'email.unique'=>'Email đã tồn tại',
            'password.same'=>'Mật khẩu và xác thực không khớp'
        ];
    }
    public function attributes()
    {
        return [
            'name'=>'Họ tên',
            'email'=>'Email',
            'password'=>'Mật khẩu',
            'phone'=>'Số điện thoại',
            'address'=>'Địa chỉ',
            'role'=>'Quyền',
        ];
    }
}
