<?php

namespace App\Http\Controllers;

use App\Models\Publisher;

class PublishersController extends Controller
{
    public function index()
    {
        $publishers = Publisher::withCount('games')->orderBy('games_count', 'desc')->paginate(25);

        return view('publishers.index', compact('publishers'));
    }

    public function show(Publisher $publisher)
    {
        $publisher->load('games');

        return view('publishers.show', compact('publisher'));
    }
}
