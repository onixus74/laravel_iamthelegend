<?php

namespace IAmLegend;

use Illuminate\Database\Eloquent\Model;


class Tournament extends Model
{
    protected $fillable = ['name', 'teams_number', 'start_time'];

    public function teams(){
        return $this->belongsToMany('Team');
    }
}
