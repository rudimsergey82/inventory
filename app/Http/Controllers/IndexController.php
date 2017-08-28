<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    public function index()
    {
        if (view()->exists('page')){
            return view('page');
        }
        abort(404);
    }

/*    public function getItem(){
        return view('showItem');
    }*/
}
