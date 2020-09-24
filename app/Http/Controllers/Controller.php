<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function testFn()
    {
        return response()->json(['response' => "Test?!"]);
        // $data = DB::table('users')
        // ->where('user_name', 'ida')
        // ->get();

        // $response = [
        //     'test' => $data,
        //     'status' => true,
        //     'message' => 'Success: Returns data'
        // ];

        // return response()->json($response);
    }

    // protected function login()
    // {
    //     return response()->json("login response!");
    // }

}
