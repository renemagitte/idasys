<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Support\Facades\DB;

namespace App;

use Illuminate\Database\Eloquent\Model;

class Garment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'type_of_garment', 'status', 'storage', 'brand', 'purchase_year',
        'title', 'description', 'material', 'condition', 'size', 'measurements',
        'retail_price', 'my_price', 'my_profit', 'my_sell_date', 'updated_at', 'created_at'
    ];

    public static function importGarmentRow($row)
    {

        $garment = new Garment();

        $garment->fill([
            "id" => $row->id,
            "type_of_garment" => $row->typ_av_plagg,
            "status" => $row->status,
            "storage" => $row->box_nr,
            "brand" => $row->marke,
            "purchase_year" => $row->inkopsarsasong,
            "material" => $row->material,
            "title" => $row->titel,
            "description" => $row->beskrivning,
            "condition" => $row->skick,
            "size" => $row->storlek,
            "measurements" => $row->matt_bredd,
            "retail_price" => $row->orginalpris,
            "my_price" => $row->saljpris,
            // "my_sell_date" => $row->forsaljningsdatum
        ]);

        $garment->save();

    }


}
