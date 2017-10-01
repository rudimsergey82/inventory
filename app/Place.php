<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Request;

class Place extends Model
{
    use SoftDeletes;
    //
    protected $primaryKey = 'id';
    public $incrementing = TRUE;
    public $timestamps = TRUE;

    protected $dates = ['deleted_at'];

    protected $fillable = ['name', 'type_place', 'last_audit', 'full_path', 'parent_id'];


    public function childs()
    {
        return $this->hasMany('App\Place', 'parent_id', 'id');
    }

    public function parent()
    {
        return $this->belongsTo('Place', 'parent_id');
    }

    public function audits()
    {
        return $this->hasMany('App\Audit', 'place_id', 'id');
    }

    /*    public function placeItem(){
            return $this->hasMany('App\PlaceItem', 'place_id', 'id');
        }*/

}
