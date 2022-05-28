<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class UserMatchAction extends BaseController
{
    public function __invoke()
    {
        try {
            $user = Auth::user();
            return response()->json(['message' => 'User Match Added', 'user_matches' => $user->matches()->get()], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'User Matches not found! '.$e->getMessage()], 409);
        }

    }

}
