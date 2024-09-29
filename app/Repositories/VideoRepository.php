<?php
namespace App\Repositories;

use App\Repositories\Interfaces\VideoRepositoryInterface;
use App\Models\Video;

class VideoRepository implements VideoRepositoryInterface
{

    public function all()
    {
        return Video::all();
    }

    public function videosForMain()
    {
        return Video::with('tags')->active()->take(6)->get();
    }

}