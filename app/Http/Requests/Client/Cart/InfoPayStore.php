<?php

namespace App\Http\Requests\Client\Cart;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
class InfoPayStore extends FormRequest
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
        // $person_info=$request->except('_token','order','orderer');
        
        return [
            'orderer'=>app()->make(\App\Rules\CheckInfoPayOrderer::class)
        ];
    }
}
