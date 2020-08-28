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
        'retail_price', 'my_price', 'my_profit', 'my_sell_date'
    ];


}
