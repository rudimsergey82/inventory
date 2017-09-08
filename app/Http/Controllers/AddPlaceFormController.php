<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Place;

class AddPlaceFormController extends Controller
{
    //
    protected $place;

    public function index()
    {
        if (view()->exists('addPlaceForm')){
            dump($_POST);
            return view('addPlaceForm');
        }
        abort(404);
    }
}
