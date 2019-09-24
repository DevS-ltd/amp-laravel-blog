<?php

namespace App\Models\Post;

use App\Models\Category;

trait PostRelations
{
    /**
     * The categories that belong to the post.
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_has_post', 'post_id', 'category_id');
    }
}
