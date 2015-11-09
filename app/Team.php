<?php

namespace IAmLegend;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Team extends Model
{
    protected $table = 'teams';

    protected $fillable = ['name', 'owner_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tournaments()
    {
        return $this->belongsToMany(Tournament::class, 'tournament_team')->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function members() {
        return $this->belongsToMany(User::class, 'team_members')->withTimestamps();
    }

    /**
     * @return mixed
     */
    public function getAcceptedTeamInvitations() {

        return TeamInvite::where(function($query)  {
            $query->where('sender_id', Auth::user()->id);
            $query->where('status', TeamInviteStatus::ACCEPTED);
            $query->where('team_id', $this->id);
        })->get();

    }

    /**
     * Return the number of members in a Team
     *
     * @return int
     */
    public function getTeamMembersCount() {
        return $this->members()->count();
    }

}
