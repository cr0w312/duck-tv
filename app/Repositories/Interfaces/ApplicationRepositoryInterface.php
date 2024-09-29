<?php

namespace App\Repositories\Interfaces;

use App\Http\Requests\NewApplicationRequest;

interface ApplicationRepositoryInterface
{
    public function store(NewApplicationRequest $request);
}