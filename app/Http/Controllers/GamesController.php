<?php

namespace App\Http\Controllers;

use App\Models\Game;

class GamesController extends Controller
{
    public function index()
    {
        return view('games.index');
    }

    public function show(Game $game)
    {
        $game->load(['platforms', 'credits' => function($query) {
            $query->withCount('credits');
        }]);

        return view('games.show', compact('game'));
    }
}
