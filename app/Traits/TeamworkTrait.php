<?php namespace IAmLegend\Traits;


trait TeamworkTrait
{

    public function teams() {
        return $this->belongsToMany(Team::class);
    }

    public function invites() {
        return $this->hasMany(Invite::class);
    }

    public function sendInvitation(Model $recepient, Model $team) {
        $invite = (new TeamInvite())->fill([
            'sender_id' => Auth::id(),
            'recepient_id' => $recepient->id,
            'status' => STATUS::PENDING,
            'team' => $team->id
        ]);

        $this->invites()->save($invite);

        return $invite;
    }

    public function addMemberToTeam( Model $member, Model $team ) {
        if($this->hasMember($member)) {
            return;
        }

    }

    public function removeMemberFromTeam(Model $team) {

    }

    public function hasMember(Model $member) {
        $teams = Team::all();
        return in_array($member->id, $teams);
    }

}