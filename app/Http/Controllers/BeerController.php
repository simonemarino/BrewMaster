<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Models\User;
use App\Services\BeersService;
use Illuminate\Support\Facades\Http;

class BeerController extends Controller
{
    public function __construct(BeersService $beersService)
    {
        $this->beersService = $beersService;
    }

    public function index(Request $request)
    {
        $token = auth()->user()->access_token;
        return view('beers', compact('token'));
    }

    public function getData(Request $request)
    {
        return response()->json(['data' => $this->beersService->getBeers($request)]);
    }

    public function getDataTotal(Request $request)
    {
        return response()->json(['total_items' => count($this->beersService->getTotalBeers($request))]);
    }






}
