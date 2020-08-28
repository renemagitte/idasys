<?php

use App\User;

use App\Garment;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

use App\Imports\GarmentsImport;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Support\Facades\Auth;

/*
 * A collection of functions, to be used with console command "Scriptfunction".
 * To run: php artisan scriptfunc [name of function]
 * $arg variable holds name of the provided function
 */

//Execute the function, and send in optional arg2
if(function_exists($arg)){

    if(isset($arg2)){
        switch(count($arg2)) {
            case 1 :
                $arg($arg2[0]);
                break;
            case 2:
//                echo '2 args sent, no 1 being: ' . $arg2[0] . '\n';
                $arg($arg2[0],$arg2[1]);
                break;
        }
    }else{
        $arg();
    }

}else{
    die('Error: function ' . $arg . ' does not exist');
}

//exempel
function minfunktion(){        // php artisan scriptfunc minfunktion
    echo "hello";
}

function fillGarmentsFromCsv() {
   // $data = Storage::get('storage/app/garments_csv.csv');
   $file = public_path('file/garments_csv.csv');

   $customerArr = csvToArray($file);

    for ($i = 0; $i < count($customerArr); $i ++)
    {
        print_r($customerArr[$i]);
    //    Garment::firstOrCreate($customerArr[$i]);
    }
}

function fillGarmentsFromExcel() { // php artisan scriptfunc fillGarmentsFromExcel
    // $data = Storage::get('storage/app/garments_csv.csv');

    // $file = public_path('file/garments_xlsx.xlsx');
    // $test = Excel::import(new GarmentsImport, $file);

    print_r("jaha");
    // print_r($test);


//     $request = new stdClass();
//    $request->email = 'ida@hmmm.se';
//    $request->password = 'hej';
//    $request->name = 'jåå';


//     $newUserId = User::createUser($request);
//     $newPage->fill([
//         'published_at' => $article->created_at,
//     ]);
//     $newPage->save();

    $idaUser = User::find(14);

    $idaUser->fill([
        'name' => "Nytt namn!",
    ]);
    $idaUser->save();

    print_r($idaUser);
 }


function csvToArray($filename = '', $delimiter = ',')
{
    if (!file_exists($filename) || !is_readable($filename))
        return false;

    $header = null;
    $data = array();
    if (($handle = fopen($filename, 'r')) !== false)
    {
        while (($row = fgetcsv($handle, 1000, $delimiter)) !== false)
        {
            // if (!$header)
                $header = $row;
            // else
                $data[] = array_combine($header, $row);
        }
        fclose($handle);
    }

    return $data;
}

// function copyArticlesCreatedAtToPublishedAt(){        //php artisan scriptfunc copyArticlesCreatedAtToPublishedAt

//     $articles = Article::all();

//     foreach($articles as $article) {
//         $newPage = Article::find($article->id);

//         $newPage->fill([
//             'published_at' => $article->created_at,
//         ]);
//         $newPage->save();
//     }
//     echo "copyArticlesCreatedAtToPublishedAt";

// }
