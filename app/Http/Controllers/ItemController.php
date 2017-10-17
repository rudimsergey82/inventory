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

    /*public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'identification' => 'required|integer|unique:items|max:255|',
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
    }*/

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
        $items = DB::table('places')
            ->rightjoin('audits', 'places.id', '=', 'audits.place_id')
            ->rightjoin('audit_items', 'audits.id', '=', 'audit_items.audit_id')
            /*->rightjoin('audit_items', function ($join) {
                $join->on('audits.id', '=', 'audit_items.audit_id')
                    ->whereNull('deleted_at');
            })*/
            ->rightjoin('items', 'audit_items.item_id', '=', 'items.item_id')
            //->where('audit_items.deleted_at', '=', 'null')
            /*->orderBy('audit_items.item_date_check', 'desc')*/
            /*->latest()*/
            /*->distinct()*/
            ->get();
        dump($items);
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
        dump(Item::find($id)->auditItems()->latest()->get());

        $item = DB::table('audit_items')
            ->where('audit_items.item_id', '=', $id)
            ->leftjoin('items', 'audit_items.item_id', '=', 'items.item_id')
            ->leftjoin('audits', 'audit_items.audit_id', '=', 'audits.id')
            ->leftjoin('places', 'audits.place_id', '=', 'places.id')
            //->where('audit_items.deleted_at', '=', '')
            /*->orderBy('audit_items.item_date_check', 'desc')*/
            /*->latest()*/
            /*->first()*/
            ->get();
        dump($item);
        $item2 = DB::table('items')
            ->where('items.item_id', '=', $id)
            ->leftjoin('audit_items', 'items.item_id', '=', 'audit_items.item_id')
            ->leftjoin('audits', 'audit_items.audit_id', '=', 'audits.id')
            ->leftjoin('places', 'audits.place_id', '=', 'places.id')
            //->where('audit_items.deleted_at', '=', '')
            /*->orderBy('audit_items.item_date_check', 'desc')*/
            /*->latest()*/
            /*->first()*/
            ->get();
        dump($item2);

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
            $items = AuditItem::where('item_status', '=', 'fail')->get();
            dump($items);
            $failItems = DB::table('items')
                ->leftjoin('audit_items', 'items.item_id', '=', 'audit_items.item_id')
                ->where('item_status', 'fail')
                ->get();
            dump($failItems);
            return view('failItems', compact('items', 'failItems'))->with('i');
        }
        abort(404);
    }

    protected function addPlace(Request $request)
    {
        dump($request);
        /*$allP = DB::table('audit_items')
            ->leftjoin('audits', 'audit_items.audit_id', '=', 'audits.id')
            ->leftjoin('places', 'audits.place_id', '=', 'places.id')
            ->where('audit_items.item_id', '=', $request->item_id)
            ->get();
        dump($allP);*/
        $allP2 = DB::table('places')
            ->leftjoin('audits', 'places.id', '=', 'audits.place_id')
            ->leftjoin('audit_items', 'audits.id', '=', 'audit_items.audit_id')
            ->where('audit_items.item_id', '=', $request->item_id)
            ->get();
        dump($allP2);
        /*if(!isset($allP2)) {
            foreach ($allP2 as $auditIt) {

                AuditItem::find($auditIt->id)->delete();

            }
        }*/
        //dump(Audit::all()->where('place_id', $request->place_id));

        $audit = Audit::firstOrcreate(['place_id' => $request->place_id]);
        dump($audit);
        //dump(Audit::all());
        $auditAll = Audit::where(['place_id' => $request->place_id])->get();
        //dump($auditAll);
        dump($audit->id);
        $AuditItem = AuditItem::create(['audit_id' => $audit->id, 'item_id' => $request->item_id, 'item_status' => 'new', 'item_date_check' => date('Y-m-d H:i:s')]);
        dump($AuditItem);
        return /*redirect()->route('places.index')*/$this->showItem($request->item_id);
    }

    protected function addAudit(Request $request)
    {
        $input = [];
        //dump($request);
        $auditOld = Item::find($request->item_id)->auditItems()->get();
        //dump($auditOld);
        foreach ($auditOld as $value){
            $input['audit_id'] = $value->audit_id;
            $input['item_id'] = $value->item_id;
        }
        //dump($input);
        AuditItem::create(['audit_id' => $input['audit_id'], 'item_id' => $input['item_id'], 'item_status' => $request->item_status, 'item_date_check' => date('Y-m-d H:i:s')]);
        return $this->showItem($request->item_id);
    }

}

