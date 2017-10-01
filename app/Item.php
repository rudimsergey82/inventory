<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use SoftDeletes;
    //
    protected $table = 'items';
    protected $primaryKey = 'id';
    public $incrementing = TRUE;
    public $timestamps = TRUE;

    protected $dates = ['deleted_at'];

    public $fillable = ['name', 'identification_number',
        'serial_number', 'specifications', 'date_create',
        'date_buy', 'coast', 'date_input_use', 'guarantee'];


    public function placeItem()
    {
        return $this->hasOne('App\PlaceItem', 'item_id', 'id');
    }
}
