<?php

namespace IAmLegend;


use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'teams';

    public function tournaments()
    {
        return $this->belongsToMany("Tounrnament");
    }
}
