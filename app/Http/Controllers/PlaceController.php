<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Place;

class PlaceController extends Controller
{
    //
    public function index(){
        if (view()->exists('showPlace')){
            /*$places = $this->getPlaces();
            dump($places);
            $place = $this->create();
            dump($place);*/
            return view('showPlace')/*->with(['places' => $places])*/;
        }
        abort(404);
    }

    public function getPlaces(){
        $places = Place::all();

        return $places;
    }

    public function create()
    {
        $place = new Place();
        return view('place.create', ['place' => $place ]);
    }
}
