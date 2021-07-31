<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class checkImageOnTours implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $listImage = $value;
        $arr_allow = ['jpg','png','svg'];
        for($i=0;$i<count($listImage);$i++){
            if(!in_array($listImage[$i]->extension(),$arr_allow)){
                return false;
            }
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Ảnh tải lên không phải định dạng ảnh';
    }
}
