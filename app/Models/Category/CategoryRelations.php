<?php

namespace App\Models\Category;

use App\Models\Post;

trait CategoryRelations
{
    /**
     * The posts that belong to the category.
     */
    public function posts()
    {
        return $this->belongsToMany(Post::class, 'category_has_post', 'category_id', 'post_id');
    }
}
