<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category\CategoryRelations;

class Category extends Model
{
    use CategoryRelations;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
