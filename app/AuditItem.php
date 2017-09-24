<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AuditItem extends Model
{
    use SoftDeletes;
    //
    protected $dates = ['deleted_at'];

    public function place()
    {
        return $this->belongsTo('App\Audit', 'id');
    }

    public function item(){
        return $this->hasOne('App\Item', 'id');
    }
}
