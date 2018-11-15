<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('game.index');
    }

    public function play(Request $request)
    {
        $player1 = $request->player1;
        $player2 = $request->player2;
        return view('game.play', compact('player1', 'player2'));
    }
    
    public function roll(Request $request)
    {
        $dice1 = rand(1, 6); 
        $dice2 = rand(1, 6); 

        $values = [$dice1, $dice2];

        return $values;
    }  
}
