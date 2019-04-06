<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignUpRequest extends FormRequest
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
        error_log("Inside rules");
        return [
            'name' => 'required',
            // 'email' => 'required|email|phone|unique:users',//as need to take phone number.
            'email' => 'required|unique:users',
            'password' => 'required|confirmed'
        ];
    }
}//class
