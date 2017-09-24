<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;


class ItemController extends Controller
{
    protected static $items;

    //
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

/*    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }*/
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
        /*dump($items);*/
        return $items;
    }

    public function showItem($id)
    {
        if (view()->exists('showItem')) {
            $item = $this->getItem($id);
            return view('showItem')->with(['item' => $item]);
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
