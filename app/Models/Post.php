<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'description',
    ];

    public function postImages()
    {
        return $this->hasMany(PostImage::class);
    }
}
