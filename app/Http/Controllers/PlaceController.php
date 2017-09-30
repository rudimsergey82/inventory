<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Place;

class PlaceController extends Controller
{
    //
    public function index()
    {
        if (view()->exists('showPlace')) {
            $tree = $this->buildTree();
            /*dump($tree);*/
            ob_start();
            $this->buildTreePlace($tree);
            $treePlaces = ob_get_contents();
            ob_end_clean();
            return view('showPlace')->with(['treePlaces' => $treePlaces]);
        }
        abort(404);
    }

    protected function store(Request $request){

        /*Place::created(function(){
            echo 'created!!!!';
        });*/
        $place = new Place;
        $place->name = $request->name;
        $place->type_place = $request->type_place;
        $place->full_path = $request->full_path;
        $place->last_audit = $request->last_audit;
        $place->parent_id = $request->parent_id;
        $place->save();
    }

    /*public function showTreePlace()
    {
        if (view()->exists('treePlaces')) {
            $tree = $this->buildTree();

            $this->buildTreePlace($tree);
            /*$place = $this->create();

            return redirect()->route('place.index')/* view('treePlaces'
                ;
        }
        abort(404);
    }*/

    /*public function index(){
        if (view()->exists('showPlace')){
            $places = $this->getPlaces();
            dump($places);
            $place = $this->create();
            dump($place);
            return view('showPlace')->with(['places' => $places]);
        }
        abort(404);
    }*/

    public function getPlaces()
    {
        $places = Place::all();
        /*dump($places);*/
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

    protected function buildTreePlace($arr, $parent_id = 0)
    {

        if (empty($arr[$parent_id])) {
            return;
        } else { ?>
            <div class="content">
                <ul>
                    <?php
                    for ($i = 0; $i < count($arr[$parent_id]); $i++) {
                        ?>
                        <li>
                            <table class="table-condensed"> <!-- border="1"-->
                                <tr> <!--class="header-table-all-places"-->
                                    <td>
                                        <!--<div>-->
                                        <?= isset($arr[$parent_id][$i]['type_place']) ? htmlspecialchars($arr[$parent_id][$i]->type_place) : '' ?>
                                        <!--</div>-->
                                    </td>
                                    <td>
                                        <p> <?= isset($arr[$parent_id][$i]['name']) ? htmlspecialchars($arr[$parent_id][$i]['name']) : '' ?></p>
                                    </td>
                                    <!--<div>-->
                               <!-- </tr>
                                <tr>-->
                                    <td>
                                        <a href="#?action=add_place&parent_id=<?= $arr[$parent_id][$i]['parent_id'] ?>&place_id=<?= $arr[$parent_id][$i]['id'] ?>">Add
                                            place</a>
                                    </td>
                                    <td>
                                        <a href="#?action=edit_place&parent_id=<?= $arr[$parent_id][$i]['parent_id'] ?>&place_id=<?= $arr[$parent_id][$i]['id'] ?>">Edit</a>
                                    </td>
                                    <td>
                                        <a href="#?action=delete_place&parent_id=<?= $arr[$parent_id][$i]['parent_id'] ?>&place_id=<?= $arr[$parent_id][$i]['id'] ?>">Delete</a>
                                    </td>
                                    <td>
                                        <a href="#?action=delete_place&parent_id=<?= $arr[$parent_id][$i]['parent_id'] ?>&place_id=<?= $arr[$parent_id][$i]['id'] ?>">Audit</a>
                                    </td>
                                    <!--</div>-->
                                    <?php
                                    self::buildTreePlace($arr, $arr[$parent_id][$i]['id']);
                                    /*viewPlaces($arr, $arr[$parent_id][$i]['id']);*/
                                    ?>
                                </tr>
                            </table>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        <?php }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function managePlace()
    {
        $places = Place::where('parent_id', '=', 0)->get();
        $allPlaces = Place::pluck('name', 'id')->all();
        return view('placeTreeView', compact('places', 'allPlaces'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function addPlace(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        $input = $request->all();
        $input['parent_id'] = empty($input['parent_id']) ? 0 : $input['parent_id'];

        Place::create($input);
        return back()->with('success', 'New Place added successfully.');
    }
}
