<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class ItemController extends Controller
{
    protected static $items;
    //
    public function index(){
        if (view()->exists('showItem')){
            $items = $this->getItems();
            return view('showItem')->with(['items' => $items]);
        }
        abort(404);
    }

    public static function addItems($array){
        return self::$items = $array;
    }

    public function getItems(){
        //$items = DB::table('items')->get();
        $items = Item::all();
        dump($items);

        /*foreach ($items as $item){
            dump($item->name);
        }*/

        return $items;
    }

    public function getItem($id){
        echo 'Answer - '.$id;
    }
}
