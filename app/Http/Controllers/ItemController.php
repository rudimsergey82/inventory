<?php

namespace App\Http\Controllers;

use App\AuditItem;
use App\Item;
use App\Place;
use App\Audit;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\QRCodeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ItemController extends Controller
{
    protected static $items;

    //
    /*    protected function validator(array $data)
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
        }*/

    public function store(Request $request)
    {
        $this->validate($request, [
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

        $item = new Item;
        $item->name_item = $request->name;
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
            /*$aud = AuditItem::find(1);
            dump($aud);
            $ite = $aud->item;
            dump($ite);
            $it = Item::find(1);
            dump($it);
            $au = $it->auditItems;
            dump($au);*/
            $items = $this->getItems();
            return view('items', compact('items'))->with('i');
        }
        abort(404);
    }

    public function getItems()
    {
        /*$items1 = Item::all();
        dump($items1);*/
        $items = DB::table('places')
            ->rightjoin('audits', 'places.id', '=', 'audits.place_id')
            ->rightjoin('audit_items', 'audits.id', '=', 'audit_items.audit_id')
            ->rightjoin('items', 'audit_items.item_id', '=', 'items.item_id')
            ->get();
        /*dump($items);*/
        return $items;
    }

    public function showItem($id)
    {
        if (view()->exists('showItem')) {
            $item = $this->getItem($id);
            $num = Item::find($id);
            $audit = $num->auditItems;
            $places = Place::all();
            $allPlaces = Place::pluck('name_place', 'id')->all();
            $QRCodeController = new QRCodeController;
            $QR = $QRCodeController->getQRCodeItem($id);
            return view('showItem', compact('id', 'item', 'audit', 'places', 'allPlaces', 'num', 'QR'))->with('i');
        }
        abort(404);
    }

    public function getItem($id)
    {
        /*$item0 = Item::find($id);
        dump($item0);*/
        /*$item = DB::table('places')
            ->rightjoin('audits', 'places.id', '=', 'audits.place_id')
            ->rightjoin('audit_items', 'audits.id', '=', 'audit_items.audit_id')
            ->rightjoin('items', 'audit_items.item_id', '=', 'items.item_id')
            ->where('items.item_id', '=', $id)
            ->get();
        dump($item);*/
        $item = DB::table('items')
            ->where('items.item_id', '=', $id)
            ->leftjoin('audit_items', 'items.item_id', '=', 'audit_items.item_id')
            ->leftjoin('audits', 'audit_items.audit_id', '=', 'audits.id')
            ->leftjoin('places', 'audits.place_id', '=', 'places.id')
            ->get();
        /*dump($item);*/

        return $item;
    }

    protected function failItems()
    {
        if (view()->exists('items')) {
            /*$aud = AuditItem::find(1);
            dump($aud);
            $ite = $aud->item;
            dump($ite);
            $it = Item::find(1);
            dump($it);
            $au = $it->auditItems;
            dump($au);*/
            $items = Item::all()->where('item_status', 'fail')->get();

            $failItems = DB::able('items')
                ->leftjoin('audit_items', 'items.item_id', '=', 'audit_items.item_id')
                ->where('item_status', 'fail')
                ->get();
            return view('failItems', compact('items'))->with('i');
        }
        abort(404);
    }

    protected function addPlace(Request $request)
    {
        //dump(Audit::all()->where('place_id', $request->place_id));
        $audit = Audit::firstOrcreate(['place_id' => $request->place_id]);
        /*dump($audit);
        dump($audit->id);*/
        $AuditItem = AuditItem::create(['audit_id' => $audit->id, 'item_id' => $request->item_id, 'item_status' => 'new', 'item_date_check' => date('Y-m-d')]);
        //dump($AuditItem);
        return $this->showItem($request->item_id);
    }

    protected function addAudit(Request $request)
    {
        dump($request);
        dump(Item::find($request->item_id)->auditItems);
        return $this->showItem($request->item_id);
    }

}

