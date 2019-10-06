<?php

namespace App\Http\Requests\Post;

use App\Http\Requests\BaseRequest as Request;

class ShowPostRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->post->published || $this->post->user_id === auth()->id();
    }
}
