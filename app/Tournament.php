<?php

namespace IAmLegend;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;


class Tournament extends Model
{
    protected $fillable = ['name', 'teams_number', 'start_time'];

    protected $dates = ['start_time'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function teams(){
        return $this->belongsToMany(Team::class, 'tournament_team');
    }

    /**
     * Check If the Given Team has already entred the tournament
     *
     * @param Model $team
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function hasTeam(Model $team) {
        return $this->teams()->get()->contains($team);
    }

    public function ended() {
        return $this->start_time > Carbon::now();
    }

}
