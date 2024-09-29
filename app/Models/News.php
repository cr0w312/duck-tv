<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use \Carbon\Carbon;
use \App\Models\Tag;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    public function tags(): MorphToMany
    {
        return $this->morphToMany(Tag::class, 'taggings');
    }

    protected function getPublicationDateAttribute()
    {
        return Carbon::parse($this->publication_at)->isoFormat('DD MMMM Y');
    }
}
