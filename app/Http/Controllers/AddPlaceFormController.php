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

/*    public function addPlace()
    {
        dump($_POST);
        Place::create(
            [
                'name' => $_POST['name'],
                'type_place' => $_POST['type_place'],
                'parent_id' => $_POST['parent_id'],
            ]
        );
    }*/

        public function addPlace(Request $request)
        {
            dump($_POST);
            $this->validate($request, [
                'name' => 'required',
                'type' => 'required'
            ]);
            $input = $request->all();
            dump($input);
            $input['parent_id'] = empty($input['parent_id']) ? 0 : $input['parent_id'];

            Place::create($input);
            return back()->with('success', 'New Place added successfully.');
        }

}
