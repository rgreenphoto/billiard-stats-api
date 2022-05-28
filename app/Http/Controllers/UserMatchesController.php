<?php

namespace App\Http\Controllers;

use App\Models\UserMatch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserMatchesController extends Controller
{

    public function index(Request $request)
    {
        try {
            $user_matches = UserMatch::where('user_id', Auth::user()->id)->with('user')->limit('10')->get();
            //return successful response
            return response()->json(['user_matches' => $user_matches, 'message' => 'Success'], 201);

        } catch (\Exception $e) {
            //return error message
            return response()->json(['message' => 'User Matches Failed! '.$e->getMessage()], 409);
        }

    }

    public function store(Request $request)
    {
        //validate incoming request
        $this->validate($request, [
            'match_id' => 'required|int',
            'user_id' => 'required|int'
        ]);
        try {
            $user_match = UserMatch::create($request->toArray());
            return response()->json(['message' => 'User Match Added', 'user_match' => $user_match->fresh()], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'User Match not saved! '.$e->getMessage()], 409);
        }
    }

    public function update(Request $request)
    {
        //validate incoming request
        $this->validate($request, [
            'match_id' => 'required|int',
            'user_id' => 'required|int'
        ]);
        try {
            $user_match = (new UserMatch)->findOrFail($request->input('id'));
            $user_match->update($request->toArray());
            return response()->json(['message' => 'User Match Updated', 'user_match' => $user_match], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'User Match not updated! '.$e->getMessage()], 409);
        }
    }

    public function destroy($id)
    {
        $user_match = (new UserMatch)->findOrFail($id);
        try {
            $user_match->delete();
            return response()->json(['message' => 'User Match Deleted'], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'User Match not deleted! '.$e->getMessage()], 409);
        }
    }
}
