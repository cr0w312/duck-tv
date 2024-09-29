<?php

namespace App\Repositories;

use App\Repositories\Interfaces\NewsRepositoryInterface;
use App\Models\News;
use App\Models\Tag;

class NewsRepository implements NewsRepositoryInterface
{
    public function all()
    {
        return News::all();
    }

    public function active()
    {
        return [];
    }

    public function newsForMain()
    {
        return News::with('tags')->take(4)->get();
    }
}