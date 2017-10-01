<?php

namespace App\Http\Controllers;

use App\Item;
use App\AuditItem;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\QRCodeController;
use Illuminate\Http\Request;


class ItemController extends Controller
{
    protected static $items;

    //
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'identification' => 'required|integer|max:255|unique',
            'serial' => 'required|string|max:255',
            'specifications' => 'string|max:255',
            'dt_create' => 'date',
            'dt_buy' => 'date',
            'coast' => 'decimal|max:100',
            'dt_input_use' => 'date',
            'guarantee' => 'string|max:255',
        ]);
    }

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
