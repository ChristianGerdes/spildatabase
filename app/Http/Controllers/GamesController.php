<?php

namespace App\Http\Controllers;

use App\Models\Game;

class GamesController extends Controller
{
    public function index()
    {
        $games = Game::paginate(50);

        return view('games.index', compact('games'));
    }

    public function show(Game $game)
    {
        $game->load(['platforms', 'credits' => function($query) {
            $query->withCount('credits');
        }]);

        return view('games.show', compact('game'));
    }
}
