<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Place extends Model
{
    use SoftDeletes;
    //
    protected $primaryKey = 'id';
    public $incrementing = TRUE;
    public $timestamps = TRUE;

    protected $dates = ['deleted_at'];

    /*protected $fillable = ['name', 'identification_number', 'serial_number', 'specifications', 'date_create', 'date_buy', 'coast', 'date_input_use', 'guarantee'];*/


    public function placeItem(){
        return $this->hasMany('App\PlaceItem', 'place_id', 'id');
    }

}
