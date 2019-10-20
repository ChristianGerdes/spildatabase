<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGameRequest;
use App\Http\Requests\UpdateGameRequest;
use App\Models\Game;

class GamesController extends Controller
{
    public function index()
    {
        return view('games.index');
    }

    public function show($id)
    {
        $game = Game::where('id', $id)->with(['platforms', 'publishers' => function($query) {
            $query->withCount('games');
        }, 'credits' => function($query) {
            $query->withCount('credits');
        }])->firstOrFail();

        if ( ! $game->isPublished() && (auth()->guest() || (auth()->check() && auth()->user()->role == 1))) {
            abort(404);
        }

        return view('games.show', compact('game'));
    }

    public function create()
    {
        return view('games.create');
    }

    public function store(StoreGameRequest $request)
    {
        $game = new Game($request->only('title', 'url', 'notes'));
        $game->published = auth()->user()->isAdmin();
        $game->save();

        return redirect()->back();
    }

    public function edit(Game $game)
    {
        return view('games.edit', compact('game'));
    }

    public function update(Game $game, UpdateGameRequest $request)
    {
        $game->update(
            $request->only('title', 'url', 'notes')
        );

        return redirect()->route('games.show', $game);
    }
}
