<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Video;
use App\Repositories\Interfaces\NewsRepositoryInterface;
use App\Repositories\Interfaces\VideoRepositoryInterface;

class HomeController extends Controller
{
    private $newsRepo;
    private $videoRepo;

    public function __construct(
        NewsRepositoryInterface $newsRepositiory,
        VideoRepositoryInterface $videoRepositiory
    )
    {
        $this->newsRepo = $newsRepositiory;
        $this->videoRepo = $videoRepositiory;
    }

    public function index()
    {
        $news = $this->newsRepo->newsForMain();
        $videos = $this->videoRepo->videosForMain();

        return view('home', [
            'news' => $news,
            'videos' => $videos
        ]);
    }
}
