<?php

namespace App\Http\Controllers;

use App\Models\TableType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TableTypesController extends Controller
{

    public function index(Request $request)
    {
        try {
            $table_types = DB::table('table_types')->orderBy('name')->get();
            //return successful response
            return response()->json(['table_types' => $table_types, 'message' => 'Success'], 201);

        } catch (\Exception $e) {
            //return error message
            return response()->json(['message' => 'Could not list table types!'], 409);
        }

    }

    public function store(Request $request)
    {
        //validate incoming request
        $this->validate($request, [
            'name' => 'required|string',
            'size' => 'required|string'
        ]);
        try {
            $table_type = TableType::create($request->toArray());
            return response()->json(['table_type' => $table_type, 'message' => 'Table Type Added'], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Venue not saved! '.$e->getMessage()], 409);
        }
    }

    public function update(Request $request)
    {
        //validate incoming request
        $this->validate($request, [
            'name' => 'required|string',
            'size' => 'required|string'
        ]);
        try {
            $table_type = (new TableType)->findOrFail($request->input('id'));
            $table_type->update($request->toArray());
            return response()->json(['table_type' => $table_type, 'message' => 'Table Type Updated'], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Venue not saved! '.$e->getMessage()], 409);
        }
    }

    public function destroy($id)
    {
        $table_type = (new TableType)->findOrFail($id);
        try {
            $table_type->delete();
            return response()->json(['message' => 'Table Type Deleted'], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Table Type not deleted! '.$e->getMessage()], 409);
        }
    }
}
