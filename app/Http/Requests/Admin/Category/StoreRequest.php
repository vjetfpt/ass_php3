<?php

namespace App\Http\Requests\Admin\Category;

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
            'name'=>'required|unique:categories,name',
            'image'=>'image'
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>"Bạn chưa nhập danh mục",
            'name.unique'=>"Tên danh mục đã tồn tại",
            'image.image'=>'File tải lên không phải định dạng ảnh'
        ];
    }
}
