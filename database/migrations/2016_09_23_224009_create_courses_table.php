<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            //$table->increments('id');
            $table->timestamps();

            $table->char('course_id', 15)->primary()->unique();
            $table->char('club_id', 15)->index();
            $table->string('course_name');
            $table->integer('holes');
            $table->integer('par');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('courses');
    }
}
