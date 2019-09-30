<?php

namespace App\Http\Requests\Image;

use App\Http\Requests\BaseRequest as Request;

class UploadImageRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'upload' => 'required|image|max:10240',
        ];
    }
}
