<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'identification_number' => 'required|unique|max:12',
            'name' => 'required|max:250',
            'first_name' => 'required|max:250',
            'email' => 'required|unique|email|max:250',
            'city_id' => 'required',
            'password' => 'required|unique|max:150'
        ];
    }
}
