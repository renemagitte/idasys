<?php
namespace App\Imports;
use App\Garment;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;


class GarmentsImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return Garment|null
     */
    public function model(array $row)
    {

        print_r($row[4]);
    //     return new Garment([
    //        'name'     => $row[0],
    //        'email'    => $row[1],
    //        'password' => Hash::make($row[2]),
    //     ]);
    }
}
