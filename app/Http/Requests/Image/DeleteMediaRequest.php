<?php

namespace App\Http\Requests\Image;

use App\Models\Post;
use App\Models\User;
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
        switch ($this->media->model_type) {
            case User::class:
                return $this->media->model->id === auth()->id();
            case Post::class:
                return $this->media->model->user_id === auth()->id();
            default:
                return false;
        }
    }
}
