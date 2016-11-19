<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTrainingTrainingMeasurementTypeIdToTrainingDrillsTable extends Migration
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

            $table->integer('training_measurement_type_id');


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

            $table->dropColumn('training_measurement_type_id');

        });
    }
}
