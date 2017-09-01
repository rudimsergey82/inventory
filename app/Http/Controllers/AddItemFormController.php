<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddItemFormController extends Controller
{
    public function index()
    {
        dump($_POST);
        dump($_GET);
        return view('addItemForm');
    }


}
