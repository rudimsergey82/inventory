<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                [
                    'name_item' => 'Hammer',
                    'identification_number_item' => '111001',
                    'serial_number_item' => '101010101',
                    'specifications' => 'material: steel and forest',
                    /*'day_create_item' => '01.01.2017',
                    'date_buy_item' => '01.02.2017',
                    'coast_item' => '55',
                    'date_input_use_item' => '05.02.2017',
                    'service_life' => '10'*/
                ],
                /*[
                    'name_item' => 'Pen',
                    'identification_number_item' => '100001',
                    'serial_number_item' => '101',
                    'specifications' => 'material: plastic',
                    'day_create_item' => '01.01.2017',
                    'date_buy_item' => '01.02.2017',
                    'coast_item' => '5',
                    'date_input_use_item' => '05.02.2017',
                    'service_life' => '2'
                ]*/
            ]
        );
    }
}
