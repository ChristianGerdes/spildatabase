<?php

namespace App\Http\Controllers;

use App\Models\Game;

class ReviewGamesController extends Controller
{
    public function index()
    {
        $games = Game::inReview()->get();

        return view('games.reviews', compact('games'));
    }
}
