<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class ItemController extends Controller
{
    protected static $items;
    //
    public function index(){
        if (view()->exists('items')){
            $items = $this->getItems();
            return view('items')->with(['items' => $items]);
        }
        abort(404);
    }

    public static function addItems($array){
        return self::$items = $array;
    }

    public function getItems(){
        $items = Item::all();
        dump($items);
        return $items;
    }

    public function getItem($id){
        if (view()->exists('showItem')){
            $item = $this->getItems()->find($id);
            dump($item);
            return view('showItem')->with(['item' => $item]);
        }
        abort(404);
    }
}
