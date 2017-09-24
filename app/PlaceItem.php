<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlaceItem extends Model
{
    use SoftDeletes;
    //
    protected $primaryKey = 'id';
    public $incrementing = TRUE;
    public $timestamps = TRUE;

    protected $dates = ['deleted_at'];

    public function place(){
        return $this->belongsTo('App\Place', 'place_id', 'id');
    }

    public function item(){
        return $this->belongsTo('App\Item', 'item_id', 'id');
    }


}
