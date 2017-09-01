<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;

class ItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert(
            [
                [
                    'name' => 'Hammer',
                    'identification_number' => '111111',
                    'serial_number' => '10000001',
                    'specifications' => 'material: steel and tree',
                    'date_create' => '01.01.2017',
                    'date_buy' => '01.02.2017',
                    'coast' => '55.55',
                    'date_input_use' => '05.02.2017',
                    'guarantee' => '10'
                ],
                [
                    'name' => 'Hammer',
                    'identification_number' => '111001',
                    'serial_number' => '101010101',
                    'specifications' => 'material: steel and forest',
                    'date_create' => '01.01.2017',
                    'date_buy' => '01.02.2017',
                    'coast' => '55',
                    'date_input_use' => '05.02.2017',
                    'guarantee' => '10'
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
                    'guarantee' => '5'
                ]
            ]
        );
    }
}
