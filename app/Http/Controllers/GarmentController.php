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

    public function importGarmentsFromExcel(Request $request){
        if($request->hasFile('sample_file')){
            $path = $request->file('sample_file')->getRealPath();
            $data = \Excel::load($path)->get();
            if($data->count()){
                foreach ($data as $key => $value) {
                    $arr[] = ['name' => $value->name, 'details' => $value->details];
                }
                return "verkar funka?";

                // if(!empty($arr)){
                //     \DB::table('products')->insert($arr);
                //     dd('Insert Record successfully.');
                // }
            }
        }
        dd('Request data does not have any files to import.');
    }
}
