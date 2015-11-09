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
use Input;

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
        $user = User::whereName($request->leader)->first();
        $team = (new Team())->fill([
            'owner_id' => $user->id,
            'name' => $request->name
        ]);
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
        $Name = implode(' ', splitUpercase($name));
        $user = User::whereName($Name)->first();
        $userTeam = Team::whereName($team)->first();
        $accepted = $userTeam->getAcceptedTeamInvitations()->lists('recepient_id')->toArray();
        return view('teams.teamMembers')->withUser($user)->withTeam($userTeam)->withAccepted($accepted);
    }

    public function sendInvitation($name, $team)
    {
        $Name = implode(' ', splitUpercase($name));
        $user = User::whereName($Name)->first();
        $team = Team::whereName($team)->first();
        $user->sendInvitation(User::find(Input::get('member')), $team);
        return redirect()->back();
    }

    public function acceptTeamInvitation()
    {
        $team = Team::findOrFail(Input::get('teamIdToAccept'));
        Auth::user()->acceptInvitation($team);
        return redirect()->back();
    }

}
