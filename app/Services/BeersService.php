<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class BeersService
{
  protected string $url;
  protected $http;

  public function __construct(Http $client)
  {
    $this->url = 'https://api.punkapi.com/v2/beers';
    $this->http = $client;
  }

  public function getBeers(Request $request)
  {
        return $this->http::get($this->url, [
            'page' => $request->input('page', 2),
            'per_page' => $request->input('per_page', 30)
        ])->json();
  }
  public function getTotalBeers(Request $request)
  {
        return $this->http::get($this->url)->json();
  }
}
