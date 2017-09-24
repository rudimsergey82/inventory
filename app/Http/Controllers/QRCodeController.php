<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QRCodeController extends Controller
{
public function getQRCodeItem($id){
   /* $url = 'http://laravel.inventory/item/'.$id;*/
    return QrCode::size(100)->generate(url('item/'.$id)/*($item->id)*/);

}
}
