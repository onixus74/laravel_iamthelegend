<?php

namespace Minedun\Teamwork\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Friend.
 */
class Team extends Model
{
    /**
     * @var string
     */
    public $table = 'teams';

    /**
     * @var array
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];

}
