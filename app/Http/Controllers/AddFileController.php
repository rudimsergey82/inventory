<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use App\Item;
use Maatwebsite\Excel\Facades\Excel;

class AddFileController extends Controller
{
    //
    /**
     * Return View file
     *
     * @var array
     */
    public function importExport()
    {
        return view('items');
    }

    /**
     * File Export Code
     *
     * @var array
     */
    public function downloadExcel($type)
    {
        $data = Item::get()->toArray();
        return Excel::create('itsolutionstuff_example', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
    }

    /**
     * Import file into database Code
     *
     * @var array
     */
    public function importExcel()
    {
        if(Input::hasFile('import_file')){
            $path = Input::file('import_file')->getRealPath();

            $data = Excel::load($path, function($reader) {})->get();

            if(!empty($data) && $data->count()){

                foreach ($data->toArray() as $key => $value) {
                    if(!empty($value)){
                        dump($value);
                        foreach ($value as $v) {
                            $insert[] = [
                                'name' => $v['name'],
                                'identification_number' => $v['identification_number'],
                                'serial_number' => $v['serial_number'],
                                'specifications' => $v['specifications'],
                                'date_create' => $v['date_create'],
                                'date_buy' => $v['date_buy'],
                                'coast' => $v['coast'],
                                'date_input_use' => $v['date_input_use'],
                                'guarantee' => $v['guarantee']
                            ];
                        }
                        dump($insert);
                    }
                }
                dump($insert);
                if(!empty($insert)){
                    Item::create($insert);
                    return view('items')->with('success','Insert Record successfully.');
                }
            }
        }

        return view('items')->with('error','Please Check your file, Something is wrong there.');
    }
}
