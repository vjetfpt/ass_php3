<?php

namespace App\Http\Requests\Admin\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
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
    public function rules(Request $request)
    {
        return [
            'name'=>'required|unique:categories,name,'.$request->id,
            'image'=>'image|mimes:jpg,png,jpeg,svg'
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>"Bạn chưa nhập danh mục",
            'name.unique'=>"Tên danh mục đã tồn tại",
            'image.image'=>"File chọn không phải định dạnh ảnh",
            'image.mimes'=>"File chọn file thuộc: jpg,png,jpeg,svg"
        ];
    }
}
