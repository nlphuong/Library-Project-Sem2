<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookFormRequest extends FormRequest
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

            'title' => 'required',
            'author' => 'required',
            'publication_Year' => 'required',
            'price' => 'required',
            'no_Copies_Actual' => 'required',
            'category_id' => 'required',
            'image' => 'required'
        ];
    }
}
