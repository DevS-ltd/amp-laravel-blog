<?php

namespace App\Http\Requests\Image;

use App\Http\Requests\BaseRequest as Request;

class DeleteMediaRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->media->model->user_id === auth()->id();
    }
}
