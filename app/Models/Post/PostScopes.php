<?php

namespace App\Models\Post;

trait PostScopes
{
    /**
     * Filter By User Id.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  mixed  $user_id
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeByUser($query, $user_id)
    {
        return $query->where('user_id', $user_id);
    }

    /**
     * Get Published Posts.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePublished($query)
    {
        return $query->where('published', 1);
    }
}
