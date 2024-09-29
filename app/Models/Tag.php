<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\News;
use App\Models\Video;

class Tag extends Model
{
    use HasFactory;
    public $timestamps = null;

    public function news(): MorphToMany
    {
        return $this->morphedByMany(News::class, 'taggings');
    }

    public function videos(): MorphToMany
    {
        return $this->morphedByMany(Video::class, 'taggings');
    }
}
