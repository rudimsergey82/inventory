<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use SoftDeletes;
    //
    protected $table = 'items';
    protected $primaryKey = 'item_id';
    public $incrementing = TRUE;
    public $timestamps = TRUE;

    protected $dates = ['deleted_at'];

    public $fillable = ['name_item', 'identification_number',
        'serial_number', 'specifications', 'date_create',
        'date_buy', 'coast', 'date_input_use', 'guarantee'];


    public function auditItems()
    {
        return $this->hasMany('App\AuditItem', 'item_id', 'item_id');
    }
}
