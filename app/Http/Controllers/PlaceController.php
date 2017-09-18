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
            /*$this->showTreePlace();*/
            $tree = $this->buildTree();
            /*dump($tree);*/
            ob_start();
            $viewTreePlaces = $this->buildTreePlace($tree);
            /*$place = $this->create();*/
            /*dump($viewTreePlaces);*/
            return view('showPlace'/*, 'PlaceController@buildTreePlace'*/)/*->with(['tree' => $tree])*/;
        }
        abort(404);
    }
    public function showTreePlace()
    {
        if (view()->exists('treePlaces')) {
            $tree = $this->buildTree();
            /*dump($tree);*/
            $this->buildTreePlace($tree);
            /*$place = $this->create();*/
            /*dump($viewTreePlaces);*/
            return redirect()->route('place.index')/* view('treePlaces')*/;
        }
        abort(404);
    }

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
        /*dump($places);*/
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

        /*function viewPlaces($arr, $parent_id = 0)
        {*/
            if (empty($arr[$parent_id])) {
                //$treePlaces = ob_get_contents();
                return;
            } else { ob_get_contents()?>
                <div class="content">
                    <ul>
                        <?php
                        for ($i = 0; $i < count($arr[$parent_id]); $i++) {
                            ?>
                            <li>
                                <div>
                                    <?= isset($arr[$parent_id][$i]['type_place']) ? htmlspecialchars($arr[$parent_id][$i]->type_place) : '' ?>
                                </div>
                                <div class="">
                                    <p> <?= isset($arr[$parent_id][$i]['name']) ? htmlspecialchars($arr[$parent_id][$i]['name']) : '' ?></p>
                                </div>
                                <div>
                                    <a href="#?action=add_place&post_id=<?= $arr[$parent_id][$i]['id'] ?>&place_id=<?= $arr[$parent_id][$i]['id'] ?>">Add
                                        place</a>
                                    <a href="#?action=edit_place&post_id=<?= $arr[$parent_id][$i]['id'] ?>&place_id=<?= $arr[$parent_id][$i]['id'] ?>">Edit</a>
                                    <a href="#?action=delete_place&post_id=<?= $arr[$parent_id][$i]['id'] ?>&place_id=<?= $arr[$parent_id][$i]['id'] ?>">Delete</a>
                                </div>
                                <?php
                                self::buildTreePlace($arr, $arr[$parent_id][$i]['id']);
                                /*viewPlaces($arr, $arr[$parent_id][$i]['id']);*/
                                ?>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            <?php }
        /*}
        var_dump($tree);
        viewPlaces($tree);*/
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function managePlace()
    {
        $places = Place::where('parent_id', '=', 0)->get();
        $allPlaces = Place::pluck('name','id')->all();
        return view('placeTreeView', compact('places','allPlaces'));
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
