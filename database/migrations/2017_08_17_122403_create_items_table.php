<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_item');
            $table->bigInteger('identification_number_item')->unique();
            $table->string('serial_number_item');
            $table->string('specifications');
            $table->date('day_create_item');
            $table->date('date_buy_item');
            $table->decimal('coast_item', 9, 2);
            $table->date('date_input_use_item');
            $table->date('date_output_use_item');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
