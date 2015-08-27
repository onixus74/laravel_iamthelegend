<?php

namespace IAmLegend\Http\Controllers;

use Chumper\Datatable\Datatable;
use IAmLegend\Team;
use IAmLegend\User;

use Illuminate\Http\Request;
use IAmLegend\Http\Requests\CreateTeamForm;
use IAmLegend\Http\Controllers\Controller;
use Auth;
use Laracasts\Flash\Flash;
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
        $teams = $user->teams;
        return view('teams.myteam')->withFriends($friends)->withTeams($teams);
    }

    public function create(CreateTeamForm $request)
    {
        $team = new Team();
        $user = User::whereId($request->leader)->first();
        $team->owner_id = $user->id;
        $team->name = $request->get('name');
        $team->save();

        $user->attachTeam($team);

        Flash::success("<i class='fa fa-check'></i> Your Team has been created successfly !!");
        return redirect()->route('user_team', [studly_case(Auth::user()->name), $team->name]);
    }

    public function show($name, $team) {
        dd( Auth::user()->currentTeam->users );
    }

    public function members($name, $team)
    {
        return Datatable::collection(User::all(array('id','name')))
            ->showColumns('id', 'name')
            ->searchColumns('name')
            ->orderColumns('id','name')
            ->make();
    }



}
