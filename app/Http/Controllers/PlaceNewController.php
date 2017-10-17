<?php

namespace App\Http\Controllers;

use App\Place;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\DB;


class PlaceNewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $places = Place::all()/*latest()->paginate(5)*/;
        return view('places.index', compact('places'))
            ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $allPlaces = Place::pluck('name_place', 'id')->all();
        return view('places.create', compact('allPlaces'));
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
        $this->validate($request, [
            'type_place' => 'required',
            'name_place' => 'required',
        ]);
        $place = Place::create($request->all());
        $id = $place->id;
        return redirect()->route('places.index')
            ->with('success', 'Place created successfully');
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
        $place = Place::find($id);
        /*dump($place);*/
        $childs = Place::all()->where('parent_id', /*'=', */$id);
        /*dump($childs);*/
        $parent = Place::find($place->parent_id);
        /*dump($parent);
        dump($id);*/
        $items = DB::table('places')
            ->where('places.path', 'like', $place->path.'%' )
            ->leftjoin('audits', 'places.id', '=', 'audits.place_id')
            ->leftjoin('audit_items', 'audits.id', '=', 'audit_items.audit_id')
            ->leftjoin('items', 'audit_items.item_id', '=', 'items.item_id')
            ->get();
        dump($items);
        return view('places.show', compact('place', 'parent', 'childs', 'items'))->with('i');
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
        $place = Place::find($id);
        $allPlaces = Place::pluck('name_place', 'id')->all();
        return view('places.edit', compact('place', 'allPlaces', 'name_parent'));
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
        $this->validate($request, [
            'type_place' => 'required',
            'name' => 'required',
        ]);
        Place::find($id)->update($request->all());
        return redirect()->route('places.index')
            ->with('success', 'Place updated successfully');
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
        Place::find($id)->delete();
        return redirect()->route('places.index')
            ->with('success', 'Place deleted successfully');
    }
}
