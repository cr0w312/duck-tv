<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

use App\Models\Tag;

class Video extends Model
{
    use HasFactory;

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    public function tags(): MorphToMany
    {
        return $this->morphToMany(Tag::class, 'taggings');
    }

    public function toArray()
    {
        return [
            'imgUrl' => $this->image_path,
            'title'  => $this->title,
            'tags'   => $this->tags->pluck('title')
        ];
    }
}
