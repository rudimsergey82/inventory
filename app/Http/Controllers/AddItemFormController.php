<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddItemFormController extends Controller
{
    public function index()
    {
        return view('addItemForm');
    }
}
