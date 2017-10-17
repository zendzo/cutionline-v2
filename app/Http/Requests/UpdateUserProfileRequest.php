<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserProfileRequest extends FormRequest
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
            'first_name' => 'required|string|max:20',
            'last_name' => 'required|string|max:20',
            'grade' => 'required|string|max:20',
            'NPP' => 'required|string|max:20',
            'join_year' => 'required|date_format:"d/m/Y"',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:12',
            'password' => 'required|string|min:6|confirmed',
        ];
    }
}
