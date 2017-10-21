<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;
use App\Place;
use App\Audit;
use App\AuditItem;

class PlaceController extends Controller
{
    //
    public function index()
    {
        if (view()->exists('showPlace')) {
            $tree = $this->buildTree();
            ob_start();
            $this->buildTreePlaceNew($tree);
            $treePlaces = ob_get_contents();
            ob_end_clean();
            return view('showPlace')->with(['treePlaces' => $treePlaces]);
        }
        abort(404);
    }

    protected function store(Request $request)
    {
        /*Place::created(function(){
            echo 'created!!!!';
        });*/
        $place = new Place;
        $place->name_place = $request->name;
        $place->type_place = $request->type_place;
        $place->full_path = $request->full_path;
        $place->last_audit = $request->last_audit;
        $place->parent_id = $request->parent_id;
        $place->save();
    }

    public function getPlaces()
    {
        $places = Place::all();
        return $places;
    }

    public function create()
    {
        $place = new Place();
        return view('place.create', ['place' => $place]);
    }

    protected function buildTree()
    {
        $places = $this->getPlaces();
        if (!is_object($places)) {
            return false;
        }
        $tree = [];
        foreach ($places as $place) {
            $tree[$place['parent_id']][] = $place;
        }
        return $tree;
    }

    protected function buildTreePlaceNew($arr, $parent_id = 0)
    {
        if (empty($arr[$parent_id])) {
            return;
        } else { ?>
            <div class="content">
                <div class="panel-group">
                    <ul>
                        <?php
                        for ($i = 0; $i < count($arr[$parent_id]); $i++) {
                            ?>
                            <li>
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <h4><?= isset($arr[$parent_id][$i]['type_place']) ? htmlspecialchars($arr[$parent_id][$i]->type_place) : '' ?>
                                            : <?= isset($arr[$parent_id][$i]['name_place']) ? htmlspecialchars($arr[$parent_id][$i]['name_place']) : '' ?></h4>
                                    </div>
                                    <!--<div class="panel-body">
                                        <a href="#?action=add_place&parent_id=<? /*= $arr[$parent_id][$i]['parent_id'] */ ?>&place_id=<? /*= $arr[$parent_id][$i]['id'] */ ?>">Add
                                            place</a>
                                        <a href="#?action=edit_place&place_id=<? /*= $arr[$parent_id][$i]['id'] */ ?>">Edit</a>
                                        <a href="#?action=delete_place&parent_id=<? /*= $arr[$parent_id][$i]['parent_id'] */ ?>&place_id=<? /*= $arr[$parent_id][$i]['id'] */ ?>">Delete</a>
                                        <a href="#?action=audit_place&place_id=<? /*= $arr[$parent_id][$i]['id'] */ ?>">Audit</a>
                                    </div>-->
                                </div>
                                <?php
                                self::buildTreePlaceNew($arr, $arr[$parent_id][$i]['id']);
                                /*viewPlaces($arr, $arr[$parent_id][$i]['id']);*/
                                ?>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        <?php }
    }


    protected function addAudit(Request $request)
    {
        foreach ($request->request as $key => $value) {
            if (($value === 'ok') || ($value === 'new') || ($value === 'fail')) {
                //dump($key);
                $list_id = explode('_', ltrim(rtrim($key, '_'), 'item_status_'));
                //dump(Audit::where('place_id', '=', $request->place)->get());
                $audit_id = Audit::firstOrcreate(['place_id' => $list_id['1']]);
                //dump($list_id);
                //dump($audit_id);
                //dump($value);
                AuditItem::create(
                    [
                        'audit_id' => $audit_id->id,
                        'item_id' => $list_id['0'],
                        'item_status' => $value,
                        'item_date_check' => date('Y-m-d H:i:s')
                    ]
                );
            }
        }
        return redirect()->route('places.show', $request->place)->with('success', 'Audits places created successfully');
    }

    protected function addItem(Request $request)
    {
        dump($request->request);
        dump($request->identification_item);
        if ($request->identification_item != null) {
            $place_id = $request->place;
            dump($place_id);
            $item_id = Item::where('identification_number', '=', $request->identification_item)->get();
            foreach ($item_id as $item) {
                $id_item = $item->item_id;
            }
            dump($item_id);
            $audit_id = Audit::firstOrcreate(['place_id' => $place_id]);
            dump($audit_id->id);
            //dump($item_id->item_id);
            AuditItem::create(
                [
                    'audit_id' => $audit_id->id,
                    'item_id' => $id_item,
                    'item_status' => 'ok',
                    'item_date_check' => date('Y-m-d H:i:s')
                ]
            );
        }
        return redirect()->route('places.show', $request->place)
            ->with('success', 'Audits places created successfully');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function managePlace()
    {
        $places = Place::where('parent_id', '=', 0)->get();
        $allPlaces = Place::pluck('name_place', 'id')->all();
        return view('placeTreeView', compact('places', 'allPlaces'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function addPlace(Request $request)
    {
        if (\Auth::user()->hasRole('admin')) {
            $this->validate($request, [
                'type_place' => 'required',
                'name_place' => 'required',
            ]);
            $input = $request->all();
            $input['parent_id'] = empty($input['parent_id']) ? 0 : $input['parent_id'];

            Place::create($input);
            return back()->with('success', 'New Place added successfully.');
        }
        return redirect('/')->with('error_roles', 'You have not enough rights for operations');
    }

    public function __construct()
    {
        $this->middleware('auth');

    }
}
