<?php

namespace App\Http\Controllers;

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
        /*dump($_POST);*/
        return view('addItemForm');
    }

    public function addItem(Request $request)
    {
        dump($_POST);
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'identification' => 'required|integer|unique:items|max:100',/**/
            'serial' => 'required|string|max:100',
            'specifications' => 'string',
            'dt_create' => 'date',
            'dt_buy' => 'date',
            /*'coast' => 'decimal',*/
            'dt_input_use' => 'date',
            'guarantee' => 'string|max:10',
        ]);
        Item::create(
            [
                'name_item' => $request['name'],
                'identification_number' => $request['identification'],
                'serial_number' => $request['serial'],
                'specifications' => $request['specifications'],
                'date_create' => $request['dt_create'],
                'date_buy' => $request['dt_buy'],
                'coast' => $request['coast'],
                'date_input_use' => $request['dt_input_use'],
                'guarantee' => $request['guarantee']
            ]
        );
        return view('addItemForm')->with('success', 'New Place added successfully.');
    }

}
