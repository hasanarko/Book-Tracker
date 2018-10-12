<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
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
            'username' =>       'required|unique:users,user_name',
            'user_fullname' =>  'required',
            'pass1' =>          'required|same:pass2',
            'email' =>          'required|email|unique:users,user_email',
            'phone' =>          'required',
            'address' =>        'required',
            'city' =>           'required'
        ];
    }

    public function messages(){
        return[
            'pass1.same' => 'Password Mismatched with Conform Password',
        ];
    }



}
