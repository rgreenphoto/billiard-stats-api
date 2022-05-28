<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function index(Request $request)
    {
        try {
            $users = DB::table('users')->select('id', 'full_name', 'first_name', 'last_name')->orderBy('first_name')->get(); //User::select('id', 'full_name')->all();
            //return successful response
            return response()->json(['users' => $users, 'message' => 'Success'], 201);

        } catch (\Exception $e) {
            //return error message
            return response()->json(['message' => 'User Matches Failed! '.$e->getMessage()], 409);
        }

    }
}
