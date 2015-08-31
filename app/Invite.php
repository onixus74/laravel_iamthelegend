<?php
/**
 * Created by PhpStorm.
 * User: Yassine Ben Slimane
 * Date: 31/08/2015
 * Time: 00:38
 */

namespace IAmLegend;


use Illuminate\Database\Eloquent\Model;

class Invite extends Model
{

    protected $table = 'team_invites';

    protected $fillable = ['id'];

}