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
            $table->increments('item_id');
            $table->string('name_item');
            $table->bigInteger('identification_number')->unique();
            $table->string('serial_number');
            $table->string('specifications')->nullable();
            $table->date('date_create')->nullable();
            $table->date('date_buy')->nullable();
            $table->decimal('coast', 9, 2)->nullable();
            $table->date('date_input_use')->nullable();
            $table->string('guarantee', 10)->nullable();
            $table->timestamps();
            $table->softDeletes();
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
