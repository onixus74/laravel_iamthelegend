<?php

namespace Minedun\Teamwork\Contracts;

use Illuminate\Database\Eloquent\Model;

/**
 * Interface Friendable.
 */
interface Teamwork
{

    public function teams();

    public function invites();

    public function sendInvitation(Model $recepient);

    public function addMemberToTeam(Model $team);

    public function removeMemberFromTeam(Model $team);

    public function hasMember(Model $member);
}
