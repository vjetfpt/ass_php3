<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CheckInfoPayOrderer implements Rule
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
        $check = 0;
        foreach($value as $va){
            if(empty($va)){
                $check = 1;
            }
        }
        if($check>0){
            return false;
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
        return 'Bạn cần nhập đủ thông tin người đặt tour.';
    }
}
