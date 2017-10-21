<?php

namespace App\Http\Controllers;

use App\Item;
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
        if (\Auth::user()->hasRole('admin')) {
            $allPlaces = Place::pluck('name_place', 'id')->all();
            return view('places.create', compact('allPlaces'));
        }
        return redirect('/')->with('error_roles', 'You have not enough rights for operations');
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
            'type_place' => 'required|string',
            'name_place' => 'required|string|unique:places|max:190',
        ]);
        $path = Place::find($request->parent_id)->path;

        $place = Place::create($request->all());
        $id = $place->id;
        $newPath = $path . '/' . $place->name_place;
        Place::find($id)->update(['path' => $newPath]);
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
        $childs = Place::all()->where('parent_id', $id);
        $parent = Place::find($place->parent_id);
        $allItems = Item::pluck('name_item', 'identification_number')->all();
        $arrayItems = [];
        foreach ($allItems as $key => $value) {
            $arrayItems[$key] = $value . '/' . $key;
        }
        $items = DB::table('places')
            ->where('places.path', 'like', $place->path . '%')
            ->leftjoin('audits', 'places.id', '=', 'audits.place_id')
            ->leftjoin('audit_items', 'audits.id', '=', 'audit_items.audit_id')
            ->leftjoin('items', 'audit_items.item_id', '=', 'items.item_id')
            ->get();
        return view('places.show', compact('place', 'parent', 'childs', 'items', 'arrayItems'))->with('i');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (\Auth::user()->hasRole('admin')) {
            $place = Place::find($id);
            $allPlaces = Place::pluck('name_place', 'id')->all();
            return view('places.edit', compact('place', 'allPlaces', 'name_parent'));
        }
        return redirect('/')->with('error_roles', 'You have not enough rights for operations');
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
            'type_place' => 'required|string',
            'name_place' => 'required|string|max:190',/*unique:places|*/
        ]);
        Place::find($id)->update($request->all());
        $path = Place::find($request->parent_id)->path;
        $place = Place::find($id)->first();
        $newPath = $path . '/' . $place->name_place;
        Place::find($id)->update(['path' => $newPath]);

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
        if (\Auth::user()->hasRole('admin')) {
            Place::find($id);
            Place::find($id)->delete();
            return redirect()->route('places.index')
                ->with('success', 'Place deleted successfully');
        }
        return redirect('/')->with('error_roles', 'You have not enough rights for operations');
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
    /*public function __construct()
    {
        $this->middleware('role:admin');
    }*/
}
