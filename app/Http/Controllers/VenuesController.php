<?php

namespace App\Http\Controllers;

use App\Models\Venue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VenuesController extends Controller
{

    public function index(Request $request)
    {
        try {
            $venues = DB::table('venues')->orderBy('name')->get();
            //return successful response
            return response()->json(['venues' => $venues, 'message' => 'Success'], 201);

        } catch (\Exception $e) {
            //return error message
            return response()->json(['message' => 'Venues not found!'], 409);
        }

    }

    public function show($id) {
        try {
            $venue = Venue::findOrFail($id);
            return response()->json(['venue' => $venue->toArray(), 'message' => 'Success']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Format not found '.$e->getMessage()]);
        }
    }

    public function store(Request $request)
    {
        //validate incoming request
        $this->validate($request, [
            'name' => 'required|string',
        ]);
        try {
            $venue = Venue::create($request->toArray());
            return response()->json(['message' => 'Venue Added'], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Venue not saved! '.$e->getMessage()], 409);
        }
    }

    public function update(Request $request)
    {
        //validate incoming request
        $this->validate($request, [
            'name' => 'required|string',
        ]);
        try {
            $venue = (new Venue)->findOrFail($request->input('id'));
            $venue->update($request->toArray());
            return response()->json(['message' => 'Venue Updated'], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Venue not updated! '.$e->getMessage()], 409);
        }
    }

    public function destroy($id)
    {
        $venue = (new Venue)->findOrFail($id);
        try {
            $venue->delete();
            return response()->json(['message' => 'Venue Deleted'], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Venue not deleted! '.$e->getMessage()], 409);
        }
    }
}
