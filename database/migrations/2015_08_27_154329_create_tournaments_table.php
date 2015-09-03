<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTournamentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tournaments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer("teams_number");
            $table->dateTime('start_time');
            $table->timestamps();
        });

        //Pivot Table for tournament team
        Schema::create('tournament_team', function (Blueprint $table) {
            $table->integer('tournament_id')->unsigned()->index();
            $table->foreign('tournament_id')->references('id')->on('tournaments')->onDelete('cascade');

            $table->integer('team_id')->unsigned()->index();
            $table->foreign('team_id')->references('id')->on('teams');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tournaments');
        Schema::dropIfExists('tournament_team');
    }
}
