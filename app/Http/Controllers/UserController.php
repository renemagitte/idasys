<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\User;

class UserController extends Controller
{

    public function createUser(Request $request)
    {
        $doesEmailExist = User::where('email', '=', $request->email)->first();

        if(empty($doesEmailExist) === false) {
            $response = [
                'status' => false,
                'message' => 'Error: Cannot create user because email already exists.'
            ];
            return response()->json($response);
        }

        $newUserId = User::createUser($request);

        if(($newUserId > 0) === false) {
            $response = [
                'status' => false,
                'message' => 'Error: Failed when trying to create user.'
            ];
            return response()->json($response);
        }

        $response = [
            'status' => true,
            'message' => 'Success: User with id '.$newUserId.' was created.',
        ];
        return response()->json($response);
    }
}
