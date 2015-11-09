<?php

namespace DraperStudio\Friendable\Models;

use IAmLegend\User;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Friend.
 */
class Friend extends Model
{
    /**
     * @var string
     */
    public $table = 'friendships';

    /**
     * @var array
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function sender()
    {
        return $this->morphTo('sender');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function recipient()
    {
        return $this->morphTo('recipient');
    }
}
