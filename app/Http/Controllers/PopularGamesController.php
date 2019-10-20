<?php

namespace App\Http\Controllers;

use App\Models\Game;

class PopularGamesController extends Controller
{
    public function index()
    {
        $games = Game::published()->inRandomOrder()->take(25)->with('publishers', 'credits')->get();

        return view('games.list', compact('games'));
    }
}
