<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->integer('request_id')->unsigned();
            $table->string('name')->nullable();
            $table->string('terms_code')->nullable();
            $table->text('terms')->nullable();
            $table->string('unit')->nullable();
            $table->text('description')->nullable();
            $table->text('note')->nullable();
            $table->integer('returned_qty')->nullable();
            $table->integer('qty')->nullable();
            $table->double('price')->nullable();
            $table->double('total')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->text('general_manager_notes')->nullable();
            $table->text('operation_manager_notes')->nullable();
            $table->text('supplier')->nullable();
            $table->text('cto_manager_notes')->nullable();
            $table->text('signature_notes')->nullable();
            $table->text('hse_manager_notes')->nullable();
            $table->text('stock_manager_notes')->nullable();
            $table->text('asset_manager_notes')->nullable();
            $table->text('cost_control_manager_notes')->nullable();
            $table->text('commercial_sector_manager_notes')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('request_id')->references('id')->on('requests');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('items');
    }
}
