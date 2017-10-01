<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Place;
use App\Audit;
use App\AuditItem;
use Illuminate\Support\Facades\App;

class PlaceController extends Controller
{
    //
    public function index()
    {
        if (view()->exists('showPlace')) {
            dump(Audit::find(1)->place());
            dump(Audit::find(1));
            dump(Place::find(5));
            $tree = $this->buildTree();
            dump($tree);
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
                <div class="panel-group">
                    <ul>
                        <?php
                        for ($i = 0; $i < count($arr[$parent_id]); $i++) {
                            ?>


                            <li>
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <h4><?= isset($arr[$parent_id][$i]['type_place']) ? htmlspecialchars($arr[$parent_id][$i]->type_place) : '' ?>
                                            : <?= isset($arr[$parent_id][$i]['name']) ? htmlspecialchars($arr[$parent_id][$i]['name']) : '' ?></h4>
                                    </div>
                                    <div class="panel-body">Panel Content</div>
                                </div>
                                <table border="1"><!--class="table-condensed"-->
                                    <tr> <!--class="header-table-all-places"-->
                                        <td style="text-align: center; padding: 10px">
                                            <!--<div>-->
                                            <?= isset($arr[$parent_id][$i]['type_place']) ? htmlspecialchars($arr[$parent_id][$i]->type_place) : '' ?>
                                            <!--</div>-->
                                        </td>
                                        <td style="text-align: center; padding: 10px">
                                            <?= isset($arr[$parent_id][$i]['name']) ? htmlspecialchars($arr[$parent_id][$i]['name']) : '' ?>
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

                                    </tr>
                                </table>
                                <?php
                                self::buildTreePlace($arr, $arr[$parent_id][$i]['id']);
                                /*viewPlaces($arr, $arr[$parent_id][$i]['id']);*/
                                ?>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        <?php }
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
                                            : <?= isset($arr[$parent_id][$i]['name']) ? htmlspecialchars($arr[$parent_id][$i]['name']) : '' ?></h4>
                                    </div>
                                    <div class="panel-body">
                                        <a href="#?action=add_place&parent_id=<?= $arr[$parent_id][$i]['parent_id'] ?>&place_id=<?= $arr[$parent_id][$i]['id'] ?>">Add
                                            place</a>
                                        <a href="#?action=edit_place&place_id=<?= $arr[$parent_id][$i]['id'] ?>">Edit</a>
                                        <a href="#?action=delete_place&parent_id=<?= $arr[$parent_id][$i]['parent_id'] ?>&place_id=<?= $arr[$parent_id][$i]['id'] ?>">Delete</a>
                                        <a href="#?action=audit_place&place_id=<?= $arr[$parent_id][$i]['id'] ?>">Audit</a>
                                    </div>
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
