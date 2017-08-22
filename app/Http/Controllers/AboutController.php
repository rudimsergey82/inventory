<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    //
    public function index(){
        $header = 'Hello World!! ';
        $message = 'Page About inventory!!';

        /*$phpinfo = phpinfo();*/
        return view('about')->with(['header' => $header, 'message' => $message/*, 'phpinfo'=>$phpinfo*/]);
    }
}
