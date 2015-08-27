<?php

namespace IAmLegend;

use Mpociot\Teamwork\TeamworkTeam;

class Team extends TeamworkTeam
{
    public function tournaments()
    {
        return $this->belongsToMany("Tounrnament");
    }
}
