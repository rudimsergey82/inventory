<?php

namespace App\Http\Controllers;

use App\AuditItem;
use App\Item;
use App\Http\Controllers\ItemController;
use App\Place;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddItemFormController extends Controller
{
    protected $item;

    public function index()
    {
        return view('addItemForm');
    }

    public function addItem(Request $request)
    {
        $audit_id = 1;
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'identification_number' => 'required|integer|unique:items',
            'serial' => 'required|string|max:100',
            'specifications' => 'string|max:255',
            'dt_create' => 'date',
            'dt_buy' => 'date',
            /*'coast' => 'decimal',*/
            'dt_input_use' => 'date',
            'guarantee' => 'string|max:10',
        ]);
        $item = Item::create(
            [
                'name_item' => $request['name'],
                'identification_number' => $request['identification_number'],
                'serial_number' => $request['serial'],
                'specifications' => $request['specifications'],
                'date_create' => $request['dt_create'],
                'date_buy' => $request['dt_buy'],
                'coast' => $request['coast'],
                'date_input_use' => $request['dt_input_use'],
                'guarantee' => $request['guarantee']
            ]
        );
        AuditItem::create(
            [
                'audit_id' => $audit_id,
                'item_id' => $item->item_id,
                'item_status' => 'new',
                'item_date_check' => date('Y-m-d H-m-s')
            ]
        );
        return view('addItemForm')->with('success', 'New Place added successfully.');
    }

    public function __construct()
    {
        $this->middleware('auth');

    }

}
