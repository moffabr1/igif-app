<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingDrillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('training_drills', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('training_categories_id')->unsigned();
            $table->integer('training_media_id')->unsigned();
            $table->string('name');
            $table->longText('description');
            $table->integer('attempts');
            $table->integer('distance');
            $table->string('success_criteria');
            $table->string('measurement_type');
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
        //
        Schema::drop('training_drills');
    }
}
