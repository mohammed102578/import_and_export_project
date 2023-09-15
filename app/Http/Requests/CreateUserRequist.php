<?php

namespace App\Http\Requests;

use App\Http\Requests\PARANTAPI;
use Illuminate\Foundation\Http\FormRequest;


class CreateUserRequist extends FormRequest
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
            'name' => 'required|min:2',
            'email' => 'required|email|',
            'password' => 'required|min:6',
            'password_confirmation' => 'required_with:password|same:password|min:6',
            'mobile' => 'required|min:9',
            'avatar' => 'nullable|mimes:jpeg,jpg,png|max:2048',
            ];
    }
}
