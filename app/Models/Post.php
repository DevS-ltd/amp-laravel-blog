<?php

namespace App\Models;

use App\Models\Post\PostRelations;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Post extends Model implements HasMedia
{
    use HasMediaTrait,
        PostRelations;

    const PREVIEW = 'preview';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'annotation',
        'content',
        'user_id',
        'published',
    ];
}
