<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignKeyConstraintsForTrainingDrillsTable extends Migration
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

            $table->foreign('training_categories_id')->references('id')->on('training_categories');
            $table->foreign('training_media_id')->references('id')->on('training_media')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('training_drills', function (Blueprint $table) {
            //
            $table->dropForeign('training_drills_training_categories_id_foreign');
            $table->dropForeign('training_drills_training_media_id_foreign');

        });

    }
}
