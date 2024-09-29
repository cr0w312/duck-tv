<?php

namespace App\Repositories\Interfaces;

interface NewsRepositoryInterface
{
    public function all();

    public function active();

    public function newsForMain();
    
}