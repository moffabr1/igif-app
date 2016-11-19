<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUnitsOfLengthIdToTrainingDrillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('training_drills', function (Blueprint $table) {
            //

            $table->integer('training_units_of_length_id');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('training_drills', function (Blueprint $table) {
            //

            $table->dropColumn('training_units_of_length_id');

        });
    }
}
