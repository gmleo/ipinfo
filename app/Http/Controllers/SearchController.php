<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Models\History;
use App\Services\SearchService;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    public function search(SearchRequest $request)
    {
        $history = SearchService::call_endpoint($request);

        if ($history) {
            return view('search.results', ['history' => $history]);
        } else {
            return redirect()->route('dashboard')->with('message', 'No information was found for this IP ' . $request->ip . '.');
        }
    }

    public function results()
    {
        $history = History::first();
        return view('search.results', ['history' => $history]);
    }
}
