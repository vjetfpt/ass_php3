<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\checkUniqueEmailOnUsers;
class StoreEditRequest extends FormRequest
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
            'name' => 'required|max:200',
            'email' => [
                'required',
                'email',
                new checkUniqueEmailOnUsers()
            ],
            'phone' => 'required',
            'address' => 'required',
            'role' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'required' => ':attribute không được để trống',
            'name.max' => 'Nhập quá ký tự cho phép',
            'email.email' => 'Nhập không đúng định dạng email',
            'email.unique' => 'Email đã tồn tại',
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'Họ tên',
            'email' => 'Email',
            'phone' => 'Số điện thoại',
            'address' => 'Địa chỉ',
            'role' => 'Quyền',
        ];
    }
}
