<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Garment;
use Illuminate\Support\Facades\DB;

class GarmentController extends Controller
{

    public static function getGarments()
    {
        $garments = DB::table('garments_test')->get();
        $response = [
            'status' => true,
            'message' => 'Success: Returning garments.',
            'garments' => $garments
        ];
        return response()->json($response);
    }
}
