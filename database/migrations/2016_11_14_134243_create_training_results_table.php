<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('training_results', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('training_drills_id')->unsigned();
            $table->integer('training_categories_id')->unsigned();
            $table->date('training_date');
            $table->integer('distance');
            $table->integer('attempts');
            $table->integer('success');
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
        Schema::drop('training_results');
    }
}
