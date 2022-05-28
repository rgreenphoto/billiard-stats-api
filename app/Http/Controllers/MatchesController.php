<?php

namespace App\Http\Controllers;

use App\Models\Match;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MatchesController extends Controller
{

    public function index(Request $request)
    {
        try {
            $matches = Match::where('user_id', Auth::user()->id)->with([
                'user_matches',
                'format',
                'table_type',
                'venue',
                'rack_type',
                'game_type'
            ])->get();
            //return successful response
            return response()->json(['matches' => $matches, 'message' => 'Success'], 201);

        } catch (\Exception $e) {
            //return error message
            return response()->json(['message' => 'Matches not loaded! '.$e->getMessage()], 409);
        }

    }

    public function store(Request $request)
    {
        //validate incoming request
        $this->validate($request, [
            'format_id' => 'required|integer',
            'venue_id' => 'required|integer',
            'game_type_id' => 'required|integer',
            'table_type_id' => 'required|integer',
            'rack_type_id' => 'required|integer'
        ]);
        try {
            $match = Match::create($request->toArray());
//            $match = Match::with(['venue', 'format', 'game_type', 'table_type', 'rack_type'])->find($new_match->id);
            return response()->json(['message' => 'Match Added', 'match' => $match], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Match not saved! '.$e->getMessage()], 409);
        }
    }

    public function update(Request $request)
    {
        //validate incoming request
        $this->validate($request, [
            'format_id' => 'required|integer',
            'venue_id' => 'required|integer',
            'game_type_id' => 'required|integer',
            'table_type_id' => 'required|integer',
            'rack_type_id' => 'required|integer'
        ]);
        try {
            $match = (new Match)->findOrFail($request->input('id'));
            $match->update($request->toArray());
            return response()->json(['match' => $match, 'message' => 'Match Updated'], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Match not saved! '.$e->getMessage()], 409);
        }
    }

    public function destroy($id)
    {
        $match = (new Match)->findOrFail($id);
        try {
            $match->delete();
            return response()->json(['message' => 'Match Deleted'], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Match not deleted! '.$e->getMessage()], 409);
        }
    }
}
