<?php

namespace App\Http\Controllers;

use App\Models\GameType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GameTypesController extends Controller
{

    public function index(Request $request)
    {
        try {
            $game_types = DB::table('game_types')->orderBy('name')->get();
            //return successful response
            return response()->json(['game_types' => $game_types, 'message' => 'Success'], 201);

        } catch (\Exception $e) {
            //return error message
            return response()->json(['message' => 'Could not list game types!'], 409);
        }

    }
    public function show($id) {
        try {
            $game_type = GameType::findOrFail($id);
            return response()->json(['game_type' => $game_type->toArray(), 'message' => 'Success']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Game Type not found '.$e->getMessage()]);
        }
    }

    public function store(Request $request)
    {
        //validate incoming request
        $this->validate($request, [
            'name' => 'required|string',
        ]);
        try {
            $game_type = GameType::create($request->toArray());
            return response()->json(['game_type' => $game_type, 'message' => 'Game Type Added'], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Game Type not saved! '.$e->getMessage()], 409);
        }
    }

    public function update(Request $request)
    {
        //validate incoming request
        $this->validate($request, [
            'name' => 'required|string',
        ]);
        try {
            $game_type = (new GameType)->findOrFail($request->input('id'));
            $game_type->update($request->toArray());
            return response()->json(['game_type' => $game_type, 'message' => 'Game Type Updated'], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Game Type not saved! '.$e->getMessage()], 409);
        }
    }

    public function destroy($id)
    {
        $game_type = (new GameType)->findOrFail($id);
        try {
            $game_type->delete();
            return response()->json(['message' => 'Game Type Deleted'], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Game Type not deleted! '.$e->getMessage()], 409);
        }
    }
}
