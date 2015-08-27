<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTeamInvitesTable extends Migration
{

    public function up()
    {
        Schema::create('teams_invites', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sender_id')->unsigned();
            $table->integer('recepient_id')->unsigned();
            $table->integer('status')->default('0');
            $table->integer('team_id')->unsigned();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('teams_invites');
    }

}