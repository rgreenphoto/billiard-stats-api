<?php

namespace App\Http\Controllers;

use App\Models\RackType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RackTypesController extends Controller
{

    public function index(Request $request)
    {
        try {
            $rack_types = DB::table('rack_types')->orderBy('name')->get();
            //return successful response
            return response()->json(['rack_types' => $rack_types, 'message' => 'Success'], 201);

        } catch (\Exception $e) {
            //return error message
            return response()->json(['message' => 'Could not list rack types! '.$e->getMessage()], 409);
        }

    }

    public function store(Request $request)
    {
        //validate incoming request
        $this->validate($request, [
            'name' => 'required|string',
        ]);
        try {
            $rack_type = RackType::create($request->toArray());
            return response()->json(['table_type' => $rack_type, 'message' => 'Rack Type Added'], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Rack not saved! '.$e->getMessage()], 409);
        }
    }

    public function update(Request $request)
    {
        //validate incoming request
        $this->validate($request, [
            'name' => 'required|string',
        ]);
        try {
            $rack_type = (new RackType)->findOrFail($request->input('id'));
            $rack_type->update($request->toArray());
            return response()->json(['table_type' => $rack_type, 'message' => 'Rack Type Updated'], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Rack not updated! '.$e->getMessage()], 409);
        }
    }

    public function destroy($id)
    {
        $rack_type = (new RackType)->findOrFail($id);
        try {
            $rack_type->delete();
            return response()->json(['message' => 'Rack Type Deleted'], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Rack Type not deleted! '.$e->getMessage()], 409);
        }
    }
}
