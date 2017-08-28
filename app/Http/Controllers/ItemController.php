<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    //
    public function index(){
        if (view()->exists('showItem')){
            return view('showItem');
        }
        abort(404);
    }
}
