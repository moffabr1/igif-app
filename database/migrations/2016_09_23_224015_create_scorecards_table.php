<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateScorecardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scorecards', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('course_id')->unsigned()->index();
            $table->string('tee_color');
            $table->integer('course_par_for_tee');
            $table->float('rating');
            $table->integer('slope');
            $table->integer('hole1_distance');
            $table->integer('hole2_distance');
            $table->integer('hole3_distance');
            $table->integer('hole4_distance');
            $table->integer('hole5_distance');
            $table->integer('hole6_distance');
            $table->integer('hole7_distance');
            $table->integer('hole8_distance');
            $table->integer('hole9_distance');
            $table->integer('hole10_distance');
            $table->integer('hole11_distance');
            $table->integer('hole12_distance');
            $table->integer('hole13_distance');
            $table->integer('hole14_distance');
            $table->integer('hole15_distance');
            $table->integer('hole16_distance');
            $table->integer('hole17_distance');
            $table->integer('hole18_distance');
            $table->integer('total_distance');
            $table->integer('hole1_par');
            $table->integer('hole2_par');
            $table->integer('hole3_par');
            $table->integer('hole4_par');
            $table->integer('hole5_par');
            $table->integer('hole6_par');
            $table->integer('hole7_par');
            $table->integer('hole8_par');
            $table->integer('hole9_par');
            $table->integer('hole10_par');
            $table->integer('hole11_par');
            $table->integer('hole12_par');
            $table->integer('hole13_par');
            $table->integer('hole14_par');
            $table->integer('hole15_par');
            $table->integer('hole16_par');
            $table->integer('hole17_par');
            $table->integer('hole18_par');
            $table->integer('hole1_handicap');
            $table->integer('hole2_handicap');
            $table->integer('hole3_handicap');
            $table->integer('hole4_handicap');
            $table->integer('hole5_handicap');
            $table->integer('hole6_handicap');
            $table->integer('hole7_handicap');
            $table->integer('hole8_handicap');
            $table->integer('hole9_handicap');
            $table->integer('hole10_handicap');
            $table->integer('hole11_handicap');
            $table->integer('hole12_handicap');
            $table->integer('hole13_handicap');
            $table->integer('hole14_handicap');
            $table->integer('hole15_handicap');
            $table->integer('hole16_handicap');
            $table->integer('hole17_handicap');
            $table->integer('hole18_handicap');
            $table->timestamps();

            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('scorecards');
    }
}
