<?php

namespace App\Http\Requests\Profile;

use App\Http\Requests\BaseRequest as Request;

class UpdateProfileRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'avatar' => 'image|max:10240',
        ];
    }
}
