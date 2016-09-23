<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clubs', function (Blueprint $table) {
            //$table->increments('id');
            $table->timestamps();
            $table->char('club_id', 15)->unique()->primary();
            $table->string('club_name');
            $table->integer('number_of_holes');
            $table->string('address')->nullable();
            $table->string('city_name')->nullable();
            $table->string('state_province_name')->nullable();
            $table->string('country_name')->nullable();
            $table->char('postal_code', 10)->nullable();
            $table->char('phone_number', 10)->nullable();
            $table->string('website')->nullable();
            $table->float('longitude')->nullable();
            $table->float('latitude')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('clubs');
    }
}
