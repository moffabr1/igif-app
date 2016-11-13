<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDrillsPuttingResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('drills_putting_results', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('drills_id')->unsigned()->index();
            $table->integer('attempts');
            $table->integer('makes');
            $table->integer('reps');
            $table->time('time');
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
        Schema::drop('drills_putting_results');

    }
}
