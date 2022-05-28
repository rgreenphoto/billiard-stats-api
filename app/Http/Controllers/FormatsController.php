<?php

namespace App\Http\Controllers;

use App\Models\Format;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FormatsController extends Controller
{

    public function index(Request $request)
    {
        try {
            $formats = DB::table('formats')->orderBy('name')->get();

            //return successful response
            return response()->json(['formats' => $formats->toArray(), 'message' => 'Success'], 201);

        } catch (\Exception $e) {
            //return error message
            return response()->json(['message' => 'Formats not loaded! '.$e->getMessage()], 409);
        }

    }

    public function show($id) {
        try {
            $format = Format::findOrFail($id);
            return response()->json(['format' => $format->toArray(), 'message' => 'Success']);
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
            $format = Format::create($request->toArray());
            return response()->json(['format' => $format, 'message' => 'Format Added'], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Format not saved! '.$e->getMessage()], 409);
        }
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
        ]);
        try {
            $format = (new Format)->findOrFail($request->input('id'));
            $format->update($request->toArray());
            return response()->json(['format' => $format, 'message' => 'Format Updated'], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Format not saved! '.$e->getMessage()], 409);
        }
    }

    public function destroy($id)
    {
        $format = (new Format)->findOrFail($id);
        try {
            $format->delete();
            return response()->json(['message' => 'Format Deleted'], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Format not deleted! '.$e->getMessage()], 409);
        }
    }
}
