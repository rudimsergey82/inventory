<?php

namespace App\Http\Controllers;

use App\Item;
use App\Http\Controllers\QRCodeController;
use Illuminate\Http\Request;


class ItemController extends Controller
{
    protected static $items;

    //
    public function store(Request $request)
    {
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
    }

    public function index()
    {
        if (view()->exists('items')) {
            $items = $this->getItems();
            return view('items')->with(['items' => $items]);
        }
        abort(404);
    }

    public function getItems()
    {
        $items = Item::all();
        dump($items);
        return $items;
    }

    public function showItem($id)
    {
        if (view()->exists('showItem')) {
            $item = $this->getItem($id);
            $QRCodeController = new QRCodeController;
            $QR = $QRCodeController->getQRCodeItem($id);
            return view('showItem'/*, QRCodeController@*/)->with(['item' => $item, 'QR' => $QR]);
        }
        abort(404);
    }

    public function getItem($id)
    {
        $item = Item::find($id);
        dump($item);
        return $item;
    }

    /**
     * @param mixed $items
     */
/*    public static function setItems($array)
    {
         self::$items = $array;
         foreach (self::$items as $item){
             $this->store($item);
         }

         return ;
    }*/

}
