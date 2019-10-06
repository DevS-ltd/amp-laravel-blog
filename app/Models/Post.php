<?php

namespace App\Models;

use App\Models\Post\PostScopes;
use App\Models\Post\PostRelations;
use Spatie\MediaLibrary\Models\Media;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Post extends Model implements HasMedia
{
    use HasMediaTrait,
        PostScopes,
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

    /**
     * Register the conversions that should be performed.
     *
     * @param Media|null $media
     * @throws \Spatie\Image\Exceptions\InvalidManipulation
     */
    public function registerMediaConversions(Media $media = null)
    {
        foreach (config('media.image_sizes') as $key => $item) {
            $this->addMediaConversion($key)
                ->width($item['width'])
                ->height($item['height']);
        }
    }
}
