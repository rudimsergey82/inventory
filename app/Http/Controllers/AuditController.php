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
            $auditPlaces =$this->getAuditPlaces();
            $items = $this->getAuditItems();
            return view('audits', compact('items', 'auditPlaces'))->with('i');
        }
        abort(404);
    }

    protected function getAuditPlaces()
    {
        return DB::table('places')
            ->leftjoin('audits', 'places.id', '=', 'audits.place_id')
            ->get();
    }

    protected function getAuditItems()
    {
        return DB::table('places')
            ->rightjoin('audits', 'places.id', '=', 'audits.place_id')
            ->rightjoin('audit_items', 'audits.id', '=', 'audit_items.audit_id')
            ->rightjoin('items', 'audit_items.item_id', '=', 'items.item_id')
            ->get();
    }

    protected function getAudits()
    {
        $audits = Audit::all();
        dump($audits);
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

}
