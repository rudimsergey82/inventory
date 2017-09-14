<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Audit extends Model
{
    use SoftDeletes;
    //
    protected $primaryKey = 'id';
    public $incrementing = TRUE;
    public $timestamps = TRUE;

    protected $dates = ['deleted_at'];

    public function place()
    {
        return $this->belongsTo('place', 'foreign_key');
    }

    public function auditItem()
    {
        return $this->hasMany('audit_item', 'id');
    }

}
