<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class UpdateUserInfoRequest extends FormRequest
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
        $user = Auth::user();
        return [
            'name'         => 'required|string|max:50',
            'email'        => 'required|string|email|max:50|unique:users,email,' . $user->id,
            'birthday'     => 'required|date',
            'gender'       => 'required|in:Male,Female',
            'phone_number' => 'required|max:15|min:10|unique:users,phone_number,' . $user->id,
            'location'     => 'required|max:255',

        ];
    }
}
