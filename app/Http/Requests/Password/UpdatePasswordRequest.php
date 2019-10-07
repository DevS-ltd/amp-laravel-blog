<?php

namespace App\Http\Requests\Password;

use Hash;
use App\Http\Requests\BaseRequest as Request;

class UpdatePasswordRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'old_password' => ['required', function ($attribute, $value, $fail) {
                if (! Hash::check($value, auth()->user()->password)) {
                    $fail(trans('manage.profile.password.incorrect'));
                }
            }],
            'password' => 'required|string|min:8|confirmed',
        ];
    }
}
