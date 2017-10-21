<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

class Place extends Model
{
    use SoftDeletes;
    //
    protected $primaryKey = 'id';
    public $incrementing = TRUE;
    public $timestamps = TRUE;

    protected $dates = ['deleted_at'];

    protected $fillable = ['name_place', 'type_place', 'parent_id', 'path'];


    public function childs()
    {
        return $this->hasMany('App\Place', 'parent_id', 'id');
    }

    public function parent()
    {
        return $this->belongsTo('App\Place', 'parent_id', 'id');
    }

    public function audits()
    {
        return $this->hasMany('App\Audit', 'place_id', 'id');
    }

/*    public function items()
    {
        return $this ->hasManyTha

    }*/
}
