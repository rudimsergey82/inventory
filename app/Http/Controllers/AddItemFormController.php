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

    public function addItem()
    {
        Item::create(
            [
                'name' => $_POST['name'],
                'identification_number' => $_POST['identification'],
                'serial_number' => $_POST['serial'],
                'specifications' => $_POST['specifications'],
                'date_create' => $_POST['dt_create'],
                'date_buy' => $_POST['dt_buy'],
                'coast' => $_POST['coast'],
                'date_input_use' => $_POST['dt_input_use'],
                'guarantee' => $_POST['guarantee']
            ]
        );

/*        Place::create([
            'place' => $_POST['place']
        ]);*/


        /*$this->ItemController@store($_POST);*/

        /* $item = new Item();
         $item->name = $_POST['name'];
         $item->identifcation_number = $_POST['identification'];
         $item->serial_number = $_POST['serial'];
         $item->specifications = $_POST['specification'];
         $item->date_create = $_POST['dt_create'];
         $item->date_buy = $_POST['dt_buy'];
         $item->coast = $_POST['coast'];
         $item->date_input_use = $_POST['dt_input_use'];
         $item->guarantee = $_POST['guarantee'];
         $item->save();*/

        /*        DB::table('items')->insert(
                    [
                        'name' => $_POST['name'],
                        'identification_number' => $_POST['identification'],
                        'serial_number' => $_POST['serial'],
                        'specifications' => $_POST['specification'],
                        'date_create' => $_POST['dt_create'],
                        'date_buy' => $_POST['dt_buy'],
                        'coast' => $_POST['coast'],
                        'date_input_use' => $_POST['dt_input_use'],
                        'guarantee' => $_POST['guarantee']
                    ]
                );*/
        return view('addItemForm');
    }

    /*    public function store(Request $request)
        {
    /*        Item::created(function(){
                echo 'created!!!!';
            });
            $item = new Item;
            $item->name = $request->name;
            $item->identification_number = $request->identification;
            $item->serial_number = $request->serial;
            $item->specifications = $request->specifications;
            $item->date_create = $request->dt_create;
            $item->date_buy = $request->dt_buy;
            $item->coast = $request->coast;
            $item->date_input_use = $request->dt_input_use;
            $item->guarantee = $request->guarantee;
            $item->save();
        }*/
}
