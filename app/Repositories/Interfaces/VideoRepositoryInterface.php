<?php
namespace App\Repositories\Interfaces;

interface VideoRepositoryInterface
{
    public function all();

    public function videosForMain();
}