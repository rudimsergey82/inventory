<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuditItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audit_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('audit_id')->references('id')->on('audits');
            $table->integer('item_id')->references('id')->on('items');
            $table->enum('item_status', ['ok', 'fail', 'new'])->default('ok');
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
        Schema::dropIfExists('audit_items');
    }
}
