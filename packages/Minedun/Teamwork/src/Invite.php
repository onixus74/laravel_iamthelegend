<?php
/**
 * Created by PhpStorm.
 * User: Yassine Ben Slimane
 * Date: 27/08/2015
 * Time: 16:04
 */

namespace Minedun\Teamwork;


use Illuminate\Database\Eloquent\Model;

class Invite extends Model
{

    protected $table = 'teams_invites';

    protected $fillable = ['id'];



}