<?php
/**
 * Created by PhpStorm.
 * User: Yassine Ben Slimane
 * Date: 27/08/2015
 * Time: 17:49
 */

namespace IAmLegend;


use Illuminate\Database\Eloquent\Model;

class TeamInvite extends Model
{

    protected $table = 'team_invites';

    protected $fillable = ['id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sender() {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function recepient() {
        return $this->belongsTo(User::class);
    }



}