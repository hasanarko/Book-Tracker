<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'bookname' => 'required',
            'category' => 'required',
            'language' => 'required',
            'bookpic' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ];
    }
}
