<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Item;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
class CsvController extends Controller
{


    public function importExport()
    {
        return view('items');
    }

    public function downloadExcel($type)
    {
        $data = Item::get()->toArray();
        return Excel::create('items_from_DB', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
    }



    //saving to db logic goes here


    public function importExcel()
    {
        if(Input::hasFile('import_file')){
            $path = Input::file('import_file')->getRealPath();
            $data = Excel::load($path, function($reader) {
            })->get();
            if(!empty($data) && $data->count()){
                dump($data);
                foreach ($data as $key => $value) {
                    $insert[] = ['name' => $value->name, 'identification_number' => $value->identification_number,
                        'serial_number' => $value->serial_number,'specifications' => $value->specifications,
                        'date_create' => $value->date_create, 'date_buy' => $value->date_buy,
                        'coast' => $value->coast,'date_input_use' => $value->date_input_use,
                        'guarantee' => $value->guarantee];
                }
                if(!empty($insert)){
                   dump($insert);
                   /* Item::create(
                        [
                            'name' => $insert['name'],
                            'identification_number' => $insert['identification'],
                            'serial_number' => $insert['serial'],
                            'specifications' => $insert['specifications'],
                            'date_create' => $insert['dt_create'],
                            'date_buy' => $insert['dt_buy'],
                            'coast' => $insert['coast'],
                            'date_input_use' => $insert['dt_input_use'],
                            'guarantee' => $insert['guarantee']
                        ]
                    );*/
                   DB::table('items')->insert($insert);
                    dd('Insert Record successfully.');
                }
            }

        }

        return back()->with('error','Please Check your file, Something is wrong there.');
    }

}

