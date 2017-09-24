<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
class PrintController extends Controller
{
   /* public function index()
    {
        return view('viewPrint');
    }*/
    public function printPreview()
    {
        $items = Item::all();

        return view('printPreview', compact('items'));
    }

   /* public function getAllItemPreview()
    {
        $allItemsPrint = [];
        $items = Item::all();
        foreach ($items as $item){
            $allItemsPrint[] = ;
        }

        return $allItemsPrint;
    }*/
}