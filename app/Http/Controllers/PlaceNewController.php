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
        $places = Place::all()/*latest()->paginate(5)*/
        ;
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
            'type_place' => 'required',
            'name_place' => 'required',
        ]);
        Place::create($request->all());
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
        $childs = Place::all()->where('parent_id', /*'=', */
            $id);
        /*dump($childs);*/
        $parent = Place::find($place->parent_id);
        /*dump($parent);
        dump($id);*/
        /*$items1 = DB::table('places')
            ->where('places.id', '=', $id)
            ->leftjoin('audits', 'places.id', '=', 'audits.place_id')
            ->leftjoin('audit_items', 'audits.id', '=', 'audit_items.audit_id')
            ->leftjoin('items', 'audit_items.item_id', '=', 'items.item_id')
            ->get();
        dump($items1);*/
        $items = DB::table('places')
            ->where('places.path', 'like', $place->path . '%')
            ->leftjoin('audits', 'places.id', '=', 'audits.place_id')
            ->leftjoin('audit_items', 'audits.id', '=', 'audit_items.audit_id')
            ->leftjoin('items', 'audit_items.item_id', '=', 'items.item_id')
            ->get();
        /* dump($items);*/

        /*if (isset($childs)) {
            $arr = [];
            foreach ($childs as $value) {
                $arr[] = $value->id;
            }
        }*/

        /*$childItems = DB::table('places')
            ->whereIn('places.id', $arr )
            ->leftjoin('audits', 'places.id', '=', 'audits.place_id')
            ->leftjoin('audit_items', 'audits.id', '=', 'audit_items.audit_id')
            ->leftjoin('items', 'audit_items.item_id', '=', 'items.item_id')
            ->get();*/

        /*dump($tree);*/
        /*dump($parent);*/

        /*dump($items);
        dump($childItems);*/
        return view('places.show', compact('place', 'parent', 'childs', 'items'))->with('i');
    }

    protected function getChilds($id)
    {
        dump($id);
        $arr = [];
        $childs = Place::all()->where('parent_id', $id);
        dump($childs);
        if (empty($childs)) {
            dump($arr);
            return $arr;
        }
        /* else/*if (isset($childs)) {*/
        foreach ($childs as $value) {
            $arr[] = $value->id;

        }
        dump($arr);
        dump(collect($arr));
        $childs = DB::table('places')
            ->whereIn('places.id', $arr /*array(1, 2, 3)*/)->get();
        dump($childs);
        self::getChilds($arr);

        /* }*/

    }

    protected function checkChilds($chis, $arr = [])
    {
        if (empty($arr->key)) {
            return $arr;
        } else {
            foreach ($chis as $child) {
                $arr[] = $child->id;
                self::checkChilds($chis, $arr);
            }
        }
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
        if (\Auth::user()->hasRole('admin')) {
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
