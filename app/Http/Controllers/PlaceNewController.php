<?php

namespace App\Http\Controllers;

use App\Place;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\Middleware;

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
        /*dump($places);*/
        /*$places = Place::all();*/
        /*$tree = $this->buildTree($places);
        dump($tree);
        ob_start();
        $this->buildTreePlaceNew($tree);
        $treePlaces = ob_get_contents();
        ob_end_clean();*/
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
        return view('places.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        /*request()->validate([
            'type_place' => 'required',
            'name' => 'required',
        ]);*/
        $this->validate($request, [
            'type_place' => 'required',
            'name' => 'required',
        ]);
        Place::create($request->all());
        return redirect()->route('places.index')
            ->with('success','Place created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $place = Place::find($id);
        $parent = Place::find($place->parent_id);
        $childs = Place::all()->where('parent_id', '=', $id)/*->get()*/;
        $items = DB::table('places')
            ->where('places.id', '=', $id)
            ->leftjoin('audits', 'places.id', '=', 'audits.place_id')
            ->leftjoin('audit_items', 'audits.id', '=', 'audit_items.audit_id')
            ->leftjoin('items', 'audit_items.item_id', '=', 'items.item_id')
            ->get();
        /*dump($place);
        dump($parent);
        dump($childs);
        dump($items);*/
        return view('places.show',compact('place', 'parent', 'childs', 'items'))->with('i');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $place = Place::find($id);
        $parent = $place->parent()->first();
        $name_parent = $parent->name_place;
        dump($place);
        dump($parent);
        dump($parent->name_place);

        return view('places.edit', compact('place', 'name_parent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        /*request()->validate([
            'type' => 'required',
            'name' => 'required',
        ]);*/
        $this->validate($request, [
            'type_place' => 'required',
            'name' => 'required',
        ]);
        Place::find($id)->update($request->all());
        return redirect()->route('places.index')
            ->with('success','Place updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Place::find($id)->delete();
        return redirect()->route('places.index')
            ->with('success','Place deleted successfully');
    }
}
