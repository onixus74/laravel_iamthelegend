<?php

namespace IAmLegend\Http\Controllers;

use IAmLegend\Team;
use IAmLegend\User;

use Illuminate\Http\Request;
use IAmLegend\Http\Requests\CreateTeamForm;
use IAmLegend\Http\Controllers\Controller;
use Auth;
use Laracasts\Flash\Flash;
use Mpociot\Teamwork\Facades\Teamwork;
use redirect;

class TeamsController extends Controller
{
    /**
     * Diplay the teams that the user is in
     *
     * @return Response
     */
    public function index($name)
    {
        $Name = implode(' ', splitUpercase($name));
        $user = User::whereName($Name)->first();
        $friends = $user->getAcceptedFriendships();
        $teams = $user->teams();
        return view('teams.myteam')->withFriends($friends)->withTeams($teams);
    }

    public function create(CreateTeamForm $request)
    {
        $team = new Team();
        $user = User::whereName($request->leader)->first();
        $team->owner_id = $user->id;
        $team->name = $request->name;
        $team->save();

        $user->teams()->attach($team);

        Flash::success("Your Team has been created successfly !!");
        return redirect()->route('user_team', [studly_case(Auth::user()->name), $team->name]);
    }

    public function show($name, $team)
    {
        $Name = implode(' ', splitUpercase($name));
        $user = User::whereName($Name)->first();
        $friends = $user->getAcceptedFriendships();
        $teams = $user->teams;
        return view('teams.myteam')->withFriends($friends)->withTeams($teams);
    }

    public function members($name, $team)
    {

    }

    public function sendInvitation($name, $team)
    {
        $Name = implode(' ', splitUpercase($name));
        $user = User::whereName($Name)->first();
    }


}
