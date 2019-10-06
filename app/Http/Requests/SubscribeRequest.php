<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest as Request;

class SubscribeRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email|max:255|unique:subscribes,email',
        ];
    }
}
