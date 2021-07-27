<?php

namespace App\Http\Requests\Admin\Tour;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
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
    public function rules(Request $request)
    {
        $check_id=isset($request->id)?",$request->id":"";
        $check_img = isset($request->id)?"":"|required";
        return [
            'name'=>'required|min:1|max:400|unique:tours,name'.$check_id,
            'price'=>'required|numeric|between:1,500000000',
            'travel_day'=>'required|numeric|between:1,400',
            'departure_place'=>'required|min:1|max:500',
            'image'=>'image'.$check_img
        ];
    }
    public function messages()
    {
        return [
            'required'=>':attribute không được để trống',
            'name.min'=>'Số ký tự nhập không hợp lệ',
            'name.max'=>'Số ký tự nhập vượt quá số ký tự cho phép',
            'name.unique'=>'Tên tour đã tồn tại',
            'price.between'=>'Giá nhập không hợp lệ',
            'travel_day.between'=>'Thời gian không hợp lệ',
            'departure_place.max'=>'Số ký tự nhập không hợp lệ',
            'departure_place.min'=>'Số ký tự nhập không hợp lệ',
            'image.image'=>'File tải lên không phải định dạng ảnh'
        ];
    }
    public function attributes()
    {
        return [
            'name'=>'Tên tour',
            'price'=>'Giá',
            'travel_day'=>'Thời gian đi',
            'departure_place'=>'Nơi khởi hành',
            'image'=>"Ảnh"
        ];
    }
}
