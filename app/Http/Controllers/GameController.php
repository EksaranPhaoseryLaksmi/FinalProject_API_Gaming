<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Publisher;
use App\Models\Developer;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index() {
        return response()->json(Game::with('publisher', 'developers')->get());
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required|string',
            'genre' => 'required|string',
            'rating' => 'required|numeric',
            'class' => 'required|string',
            'publisher_id' => 'required|exists:publishers,id',
            'developer_ids' => 'required|array'
        ]);

        $game = Game::create($request->only('title', 'genre', 'rating', 'class', 'publisher_id'));
        $game->developers()->attach($request->developer_ids);

        return response()->json(['message' => 'Game created', 'game' => $game], 201);
    }
}

