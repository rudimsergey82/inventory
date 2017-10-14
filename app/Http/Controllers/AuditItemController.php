<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AuditItem;
use App\Item;
use Illuminate\Support\Facades\DB;

class AuditItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $auditItem = AuditItem::all();
        $auditItems = DB::table('audit_items')
            ->join('items', 'audit_items.item_id', '=', 'items.id')
            ->get();
        dump($auditItems);
        $auditItems2 = DB::table('audit_items')
            ->join('items', 'audit_items.item_id', '=', 'items.id')
            ->leftjoin('audits', 'audit_items.audit_id', '=', 'audits.id')
            ->leftjoin('places', 'audits.place_id', '=', 'places.id')
            ->get();
        dump($auditItems2);
        $auditItems3 = DB::table('places')
            ->where('type_place', '=', 'place')
            /*->leftjoin('places', 'places.parent_id', '=', 'places.id')*/
            ->leftjoin('audits', 'places.id', '=', 'audits.place_id')
            /*->leftjoin('audit_items', 'audits.id', '=', 'audit_items.audit_id')
            ->leftjoin('items', 'audit_items.item_id', '=', 'items.id')*/
            ->get();
        dump($auditItems3);
        $places = DB::table('places')
            ->where('type_place', '=', 'place')
           /*->leftjoin('places', 'places.parent_id', '=', 'places.id')*/
           ->leftjoin('audits', 'places.id', '=', 'audits.place_id')
           ->leftjoin('audit_items', 'audits.id', '=', 'audit_items.audit_id')
           ->leftjoin('items', 'audit_items.item_id', '=', 'items.id')
            ->get();
        dump($places);
        $places = DB::table('places')
            ->where('places.id', '=', '5')
            ->leftjoin('audits', 'places.id', '=', 'audits.place_id')
            ->leftjoin('audit_items', 'audits.id', '=', 'audit_items.audit_id')
            ->leftjoin('items', 'audit_items.item_id', '=', 'items.id')
            ->get();
        dump($places);

        return view('audits.index', compact('auditItems'))->with('i');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('audits.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        AuditItem::create($request->all());
        return redirect()->route('audits.index')
            ->with('success', 'Audit created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $auditItem = AuditItem::find($id);
        return view('audits.show', compact('auditItem'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $auditItem = AuditItem::find($id);
        return view('audits.edit', compact('auditItem'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        AuditItem::find($id)->update($request->all());
        return redirect()->route('audits.index')
            ->with('success', 'Audit updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        AuditItem::find($id)->delete();
        return redirect()->route('audits.index')
            ->with('success', 'Place deleted successfully');
    }
}
