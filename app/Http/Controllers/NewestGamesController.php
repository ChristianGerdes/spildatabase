<?php

namespace App\Http\Controllers;

use App\Models\Game;

class NewestGamesController extends Controller
{
    public function index()
    {
        $games = Game::published()->orderBy('published_at', 'desc')->take(25)->with('publishers', 'credits')->get();

        return view('games.newest', compact('games'));
    }
}
