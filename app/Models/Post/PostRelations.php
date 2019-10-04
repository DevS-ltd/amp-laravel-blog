<?php

namespace App\Models\Post;

use App\Models\Category;
use App\Models\User;

trait PostRelations
{
    /**
     * The categories that belong to the post.
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_has_post', 'post_id', 'category_id');
    }

    /**
     * Get the author that wrote the book.
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
