<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddItemFormController extends Controller
{
    public function index()
    {
        dump($_POST);
        dump($_GET);
        print_r($_POST);
        return view('addItemForm');
    }

    public function addItem()
    {
        dump($_POST);
        ItemController::setItems($_POST);
        /* $item = new Item();
         $item->name = $_POST['name'];
         $item->identification_number = $_POST['identification'];
         $item->serial_number = $_POST['serial'];
         $item->specifications = $_POST['specification'];
         $item->date_create = $_POST['dt_create'];
         $item->date_buy = $_POST['dt_buy'];
         $item->coast = $_POST['coast'];
         $item->date_input_use = $_POST['dt_input_use'];
         $item->guarantee = $_POST['guarantee'];
         $item->save();*/

        Item::created(
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
        );

        /*        [
                    "place" => "rrrrrrrrrr",
                    "_token" => "yDcPwOifB3dTNMWmDMN4bRybkJvuqRrkZOaice3V",
                    "add_item" => "add item",
                ]*/
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
}
