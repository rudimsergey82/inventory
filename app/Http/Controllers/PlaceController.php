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
            dump($tree);
            $viewTreePlaces = $this->buildTreePlace($tree);
            /*$place = $this->create();
            dump($viewTreePlaces);*/
            return view('showPlace')->with(['viewTreePlaces' => $viewTreePlaces]);
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
        dump($places);
        if (!is_object($places)) {
            return false;
        }
        $tree = [];
        foreach ($places as $place) {
            /*dump($place);*/
            $tree[$place['parent_id']][] = $place;
        }
        /*dump($tree);*/
        return $tree;
    }

    protected function buildTreePlace($arr, $parent_id = 0)
    {

        /*function viewPlaces($arr, $parent_id = 0)
        {*/
            if (empty($arr[$parent_id])) {
                return;
            } else {?>
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

}
