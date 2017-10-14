<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AuditItem extends Model
{
    use SoftDeletes;
    //
    protected $dates = ['deleted_at'];

    protected $fillable = ['audit_id', 'item_id', 'item_status', 'item_date_check'];

    public function audit()
    {
        return $this->belongsTo('App\Audit'/*, 'audits_items_id', 'id'*/);
    }

    public function item(){
        return $this->belongsTo('App\Item', 'item_id', 'item_id');
    }
}
