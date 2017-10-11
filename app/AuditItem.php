<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AuditItem extends Model
{
    use SoftDeletes;
    //
    protected $dates = ['deleted_at'];

    public function audit()
    {
        return $this->belongsTo('App\Audit'/*, 'audits_items_id', 'id'*/);
    }

    public function item(){
        return $this->belongsTo('App\Item', 'item_id', 'id');
    }
}
