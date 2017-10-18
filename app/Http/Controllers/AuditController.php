<?php

namespace App\Http\Controllers;

use App\Audit;
use App\AuditItem;
use App\Item;
use App\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuditController extends Controller
{
    //
    public function index()
    {
        if (view()->exists('audits')) {
            $auditPlaces = $this->getAuditPlaces();
            $items = $this->getAuditItems();
            //dump($items);
            return view('audits', compact('items', 'auditPlaces'))->with('i');
        }
        abort(404);
    }

    protected function getAuditPlaces()
    {
        return DB::table('audits')
            ->rightjoin('places', 'audits.place_id', '=', 'places.id')
            ->get();
    }

    protected function getAuditItems()
    {
        /*return DB::table('places')
            ->rightjoin('audits', 'places.id', '=', 'audits.place_id')
            ->rightjoin('audit_items', 'audits.id', '=', 'audit_items.audit_id')
            ->rightjoin('items', 'audit_items.item_id', '=', 'items.item_id')
            ->get();*/
        return DB::table('places')
            ->join('audits',function ($join) {
                $join->on('places.id', '=', 'audits.place_id')
                    ->latest();
            })
            ->leftjoin('audit_items',function ($join) {
                $join->on('audits.id', '=', 'audit_items.audit_id')
                    ->latest();
            })
            ->rightjoin('items', 'audit_items.item_id', '=', 'items.item_id')
            ->get();
    }

    protected function addItmAdts(Request $request)
    {
        foreach ($request->request as $key => $value){
            if (($key != '_token' ) && ($value !== null)){
                /*dump($key);*/
                $list_id = explode('_', ltrim(rtrim($key, '_'), 'item_status_'));
                $audit_id = Audit::firstOrcreate(['place_id' => $list_id['1']]);
                /*dump($list_id);
                dump($audit_id);
                dump($value);*/
                AuditItem::create(['audit_id' => $audit_id->id, 'item_id' => $list_id['0'], 'item_status' => $value, 'item_date_check' => date('Y-m-d H:i:s')]);
            }
        }
        return redirect()->route('audit')->with('success', 'Audits items created successfully');
    }

    protected function addPlAdts(Request $request)
    {
        foreach ($request->request as $key => $value){
            if (($key != '_token' ) && ($value == 1)){
                $place_id = ltrim($key, 'place_');
                $audit_id = Audit::create(['place_id' => $place_id, 'place_date_check' => date('Y-m-d H:i:s')]);
                //dump($audit_id);
                $audit = Audit::find($place_id);
                $auditItems = $audit->auditItem;
                foreach ($auditItems as $auditItem){
                    AuditItem::create(['audit_id' => $audit_id->id, 'item_id' => $auditItem->item_id, 'item_status' => 'ok', 'item_date_check' => date('Y-m-d H:i:s')]);
                }
            }
        }
        return redirect()->route('audit')->with('success', 'Audits places created successfully');
    }

    protected function getAudits()
    {
        $audits = Audit::all();
        /*dump($audits);*/
        /*$auditPlaces = DB::table('places')
                ->leftjoin('audits', 'places.id', '=', 'audits.place_id')
                /*->groupby('places.parent_id')*/
        /*->get();*/
        /*dump($auditPlaces);*/
        /*$auditPlaces2 = DB::table('places')
            ->rightjoin('audits', 'places.id', '=', 'audits.place_id')
            ->get();
        dump($auditPlaces2);
        $auditPlaces3 = DB::table('audits')
            ->rightjoin('places', 'audits.place_id', '=', 'places.id')
            ->get();
        dump($auditPlaces3);
        $auditPlaces4 = DB::table('audits')
            ->leftjoin('places', 'audits.place_id', '=', 'places.id')
            ->get();
        dump($auditPlaces4);*/
        /*$items = DB::table('places')
            ->rightjoin('audits', 'places.id', '=', 'audits.place_id')
            ->rightjoin('audit_items', 'audits.id', '=', 'audit_items.audit_id')
            ->rightjoin('items', 'audit_items.item_id', '=', 'items.item_id')
            ->get();*/
        /*dump($items);*/
        /*$audits = $this->getAudits();*/
        return $audits;
    }

    public function __construct()
    {
        $this->middleware('auth');

    }
}
