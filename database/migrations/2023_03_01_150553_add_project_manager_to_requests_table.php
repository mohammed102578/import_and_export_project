<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProjectManagerToRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('requests', function (Blueprint $table) {
            $table->boolean('project_manager')->default(false);
            $table->string('project_manager_name')->nullable();
            $table->dateTime('project_manager_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('requests', function (Blueprint $table) {
            $table->dropColumn('project_manager');
            $table->dropColumn('project_manager_name');
            $table->dropColumn('project_manager_date');
        });
    }
}
