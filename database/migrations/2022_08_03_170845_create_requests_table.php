<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('requests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('ref');
            $table->string('code');
            $table->integer('category_id')->unsigned();
            $table->boolean('hse_manager')->default(false);
            $table->boolean('stock_manager')->default(false);
            $table->boolean('asset_manager')->default(false);
            $table->boolean('cost_control_manager')->default(false);
            $table->boolean('commercial_sector_manager')->default(false);
            $table->string('hse_manager_name')->nullable();
            $table->string('stock_manager_name')->nullable();
            $table->string('asset_manager_name')->nullable();
            $table->string('cost_control_manager_name')->nullable();
            $table->string('commercial_sector_manager_name')->nullable();

            $table->timestamps();
            $table->softDeletes();
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('requests');
    }
}
