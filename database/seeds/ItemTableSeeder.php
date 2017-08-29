<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::table('items', function (){

        })->insert(
            [
                [
                    'name' => 'Hammer',
                    'identification_number' => '111001',
                    'serial_number' => '101010101',
                    'specifications' => 'material: steel and forest',
                    'date_create' => '01.01.2017',
                    'date_buy' => '01.02.2017',
                    'coast' => '55',
                    'date_input_use' => '05.02.2017',
                    'service_life' => '05.02.2027'
                ],
                [
                    'name' => 'Screwdriver',
                    'identification_number' => '100001',
                    'serial_number' => '101',
                    'specifications' => 'material: steel and plastic',
                    'date_create' => '01.01.2017',
                    'date_buy' => '01.02.2017',
                    'coast' => '5',
                    'date_input_use' => '05.02.2017',
                    'service_life' => '05.02.2020'
                ]
            ]
        );
    }
}
