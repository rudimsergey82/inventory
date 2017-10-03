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

    protected $fillable = ['place_id', 'auditItem_id', 'date_check'];

    public function place()
    {
        return $this->belongsTo('App\Place', 'place_id', 'id');
    }

    public function auditItem()
    {
        return $this->hasMany('App\AuditItem', 'id', 'audit_items_id');
    }

}
