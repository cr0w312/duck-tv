<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NewApplicationRequest;
use App\Repositories\Interfaces\ApplicationRepositoryInterface;

class NewApplicationController extends Controller
{
	private $applicationRepo;

	public function __construct(
		ApplicationRepositoryInterface $applicationRepository
	)
	{
		$this->applicationRepo = $applicationRepository;
	}

	public function store(NewApplicationRequest $request)
	{
		$this->applicationRepo->store($request);
		
		if($request->wantsJson()){
			return response()->json(['message'=>'Ваша заявка успешно создана!'], 201);
		}

		return back()->with(['message'=>'Ваша заявка успешно создана!']);
	}
}
