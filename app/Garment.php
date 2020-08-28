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

        // return $row;

        // {"id":1,"box_nr":null,"
        //     typ_av_plagg":"Tr\u00f6ja, stickat","
        //     inkopsarsasong":2009
        //     marke":"Acne \/ Acne Studios",
        //     "modellsasong":"Barone Mix S\/S09",
        //     "material":"55% siden, 45% kashmir",
        //     "titel":"Acne \"Barone mix\" tr\u00f6ja i kashmir och siden strl S -  Acne Studios cashmere silk",
        //     "beskrivning":"Supermjuk, tunt stickad tr\u00f6ja fr\u00e5n Acne i lyxig siden\/kashmirblanding i originell flerf\u00e4rgad modell med namnet Barone Mix.\nV-ringad, trekvarts\u00e4rmar.",
        //     "skick":"Bra skick","storlek":"S men passar \u00e4ven xs enligt mig. Se m\u00e5tt.",
        //     "matt_bredd":"\u00c4rml\u00e4ngd: ca 42 fr\u00e5n \u201daxels\u00f6m\u201d till \u00e4rmslut\nL\u00e4ngd: ca 62 cm d\u00e4r den \u00e4r som l\u00e4ngst.\nBredd tv\u00e4rs \u00f6ver byst: ca 48 cm",
        //     "farg":null,"orginalpris":null,"utropspris":250,"saljpris":250,"frakt":63,"status":"SOLD","forsaljningsdatum":{"date":"2020-05-31 00:00:00.000000","timezone_type":3,"timezone":"UTC"},"inkomst_saljpris_10":225,"0":null}

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
