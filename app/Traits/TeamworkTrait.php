<?php namespace IAmLegend\Traits;


use IAmLegend\Invite;
use IAmLegend\Team;
use IAmLegend\TeamInvite;
use IAmLegend\TeamInviteStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\BinaryOp\Mod;

trait TeamworkTrait
{

    public function teams()
    {
        return $this->belongsToMany(Team::class, 'team_members')->withTimestamps();
    }

    public function invites()
    {
        return $this->hasMany(TeamInvite::class, 'sender_id');
    }

    public function sendInvitation(Model $recepient, Model $team)
    {
        $invite = new TeamInvite();
        $invite->sender_id = Auth::id();
        $invite->recepient_id = $recepient->id;
        $invite->status = TeamInviteStatus::PENDING;
        $invite->team_id = $team->id;

        $this->invites()->save($invite);

        return $invite;
    }

    public function acceptInvitation(Model $team)
    {
        $invitation = $this->findInvitation($this, $team);
        $invitation->status = TeamInviteStatus::ACCEPTED;
        $invitation->save();
        $this->addMemberToTeam($team);
    }

    public function denyInvitation(Model $team)
    {
        if ($this->isMember($this, Auth::user())) {
            return;
        }
        $this->findInvitation($this, $team)->update([
            'status' => TeamInviteStatus::DENIED
        ]);
    }

    public function isOwnerOfTeam(Model $team) {
        $team = Team::findOrFail($team->getKey());
        return $team->owner_id == Auth::user()->id;
    }

    public function addMemberToTeam(Model $team)
    {
        $this->teams()->save($team);
    }

    public function removeMemberFromTeam(Model $team)
    {

    }

    public function isMember(Model $team, Model $member)
    {
        $team = Team::findOrFail($team->getKey());
        return $team->members()->contains($member);
    }

    public function getTeamInvites()
    {
        return TeamInvite::where(function ($query) {
            $query->where('recepient_id', $this->id);
            $query->where('status', TeamInviteStatus::PENDING);
        })->get();
    }

    private function findInvitation(Model $recepient, Model $team)
    {
        return TeamInvite::where(function ($query) use ($recepient, $team) {
            $query->where('recepient_id', $this->id);
            $query->where('team_id', $team->getKey());
            $query->where('status', TeamInviteStatus::PENDING);
        })->first();
    }
}