<?php
namespace App\Repositories;

use App\Repositories\Interfaces\ApplicationRepositoryInterface;
use App\Http\Requests\NewApplicationRequest;
use App\Models\Application;
use Carbon\Carbon;

class ApplicationRepository implements ApplicationRepositoryInterface
{
    public function store(NewApplicationRequest $request)
    {
        $request->validated();
        
        $data = $request->safe()->only(['name', 'email']);
        $data['created_at'] = Carbon::now()->format('Y-m-d h:m:s');
        
        return Application::create($data);
    }
}