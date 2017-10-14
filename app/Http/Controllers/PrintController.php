<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Http\Controllers\QRCodeController;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
class PrintController extends Controller
{

    public function printPreview()
    {
        $items = Item::all();

        $COLS = 5; // кол-во столбцов

        echo '<table border="1">';
        foreach ($items as $key => $item) {
            if ($key % $COLS == 0)
                echo '<tr>';
            echo '<td>'.$item->name_item.'<br>'.
                    $item->identification_number . '<br>'
                    .QrCode::size(100)->generate(url('item/' . ($item->item_id))). '</td>';
            if (($key % $COLS) == ($COLS - 1) || $key == (sizeof($items) - 1))
                echo str_repeat('<td>&nbsp;</td>', $COLS - ($key % $COLS) - 1) . '</tr>';
        }
        echo '</table>';

        return view('printPreview', compact('items'));
    }

    public function printPreviewItem($id){

        $itemPrint = Item::find($id);
        return view('itemPrint', compact('itemPrint'))/*-> with('itemPrint', $itemPrint)*/;
    }

}