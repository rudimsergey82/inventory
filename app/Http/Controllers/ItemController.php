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

    public function getItems(){
        $items = Item::all();
        dump($items);
        return $items;
    }

    public function showItem($id){
        if (view()->exists('showItem')){
            $item = $this->getItem($id);
            return view('showItem')->with(['item' => $item]);
        }
        abort(404);
    }

    public function getItem($id){
        $item = Item::all()->find($id);
        dump($item);
        return $item;
    }

    /**
     * @param mixed $items
     */
    public static function setItems($items)
    {
        self::$items = $items;
    }


    public static function addItems($array){
        return self::$items = $array;
    }
}
