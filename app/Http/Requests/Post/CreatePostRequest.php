<?php

namespace App\Http\Requests\Post;

use App\Models\Category;
use App\Http\Requests\BaseRequest as Request;

class CreatePostRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'annotation' => 'required|string',
            'content' => 'required|string',
            'published' => 'boolean',
            'categories' => 'required|array|min:1',
            'categories.*' => 'exists:'.(new Category)->getTable().',id',
            'images' => 'required|array|min:1',
            'images.*' => 'image|max:10240',
        ];
    }
}
