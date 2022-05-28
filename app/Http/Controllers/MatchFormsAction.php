<?php

namespace App\Http\Controllers;

use App\Models\Format;
use Illuminate\Support\Facades\DB;
use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class MatchFormsAction extends BaseController
{
    public function __invoke()
    {
        try {
            $formats = DB::table('formats')->orderBy('name')->get();
            $game_types = DB::table('game_types')->orderBy('name')->get();
            $rack_types = DB::table('rack_types')->orderBy('name')->get();
            $table_types = DB::table('table_types')->orderBy('name')->get();
            $venues = DB::table('venues')->orderBy('name')->get();
            return response()->json(
                [
                    'message' => 'User Match Added',
                    'drop_downs' => compact($formats, $game_types, $rack_types, $table_types, $venues)
                ], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'User Matches not found! '.$e->getMessage()], 409);
        }

    }

}
