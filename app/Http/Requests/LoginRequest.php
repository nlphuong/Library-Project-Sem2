<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'fullname'=> 'required|max:50',
            'email'=>'required|max:100|unique:accounts',
            'password'=>'required|min:8',
            'confirm_password'=>'required|same:password',
            'address'=>'required|max:200',
        ];
    }
}
