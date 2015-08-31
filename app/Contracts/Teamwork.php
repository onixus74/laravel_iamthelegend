<?php namespace IAmLegend\Contracts;

use Illuminate\Database\Eloquent\Model;

interface Teamwork
{

    public function teams();

    public function invites();

    public function sendInvitation( Model $recepient, Model $team );

    public function acceptInvitation( Model $team );

    public function denyInvitation( Model $team );

    public function addMemberToTeam( Model $team );

    public function removeMemberFromTeam( Model $team );

    public function isMember( Model $team );
}
