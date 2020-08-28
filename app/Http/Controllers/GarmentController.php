<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Garment;
use Illuminate\Support\Facades\DB;

class GarmentController extends Controller
{
    public static function getGarments()
    {
        $garments = DB::table('garments')->get();
        $response = [
            'status' => true,
            'message' => 'Success: Returning garments.',
            'garments' => $garments
        ];
        return response()->json($response);
    }

    public function importGarmentsFromExcel(Request $request){

        if($request->hasFile('file')){
            $path = $request->file('file')->getRealPath();
            $data = \Excel::load($path)->get();
            if($data->count()){

                // $data[0] because need sheet 1 in excel file
                foreach ($data[0] as $key => $value) {

                    Garment::importGarmentRow($value);

                // if(!empty($arr)){
                //     \DB::table('products')->insert($arr);
                //     dd('Insert Record successfully.');
                }
            }
        }
        dd('Request data does not have any files to import.');
    }
}
