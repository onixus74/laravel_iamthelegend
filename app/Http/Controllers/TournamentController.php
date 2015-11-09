<?php

namespace IAmLegend\Http\Controllers;

use Carbon\Carbon;
use IAmLegend\Team;
use IAmLegend\Tournament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;
use Validator;
use Illuminate\Support\Facades\Input;
use IAmLegend\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use \Session;
use DateTime;

class TournamentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $tournaments = Tournament::all();
        return view('tournaments.index')->with('tournaments', $tournaments);
    }

    public function listShow()
    {
        $tournaments = Tournament::all();
        return view('tournaments.list')->with('tournaments', $tournaments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('tournaments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'name' => 'required',

        );
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('tournaments/create')
                ->withErrors($validator)
                ->withInput($request->all());
        } else {
            // store
            $tournament = new Tournament();
            $tournament->name = Input::get('name');
            $tournament->start_time = DateTime::createFromFormat('d/m/Y', Input::get('start_time'));
            $tournament->save();

            // redirect
            Session::flash('message', 'Successfully created Tournament!');
            return Redirect::to('tournaments');
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $tournament = Tournament::find($id);
        return view('tournaments.show', compact($tournament, 'tournament'));
    }

    /**
     * Team enters the Tournament
     *
     * @param $tournamentId
     * @return mixed
     */
    public function subscribe($tournamentId)
    {
        $tournament = Tournament::findOrFail($tournamentId);
        $team = Team::where('owner_id', Auth::id())->first();
        if ( $tournament->ended() ) {
            Flash::error("The Tournament has already started or ended.");
            return redirect()->back();
        }
        if ($team->getTeamMembersCount() < 5) {
            Flash::error("Your team needs to have a minimum of 5 members to enter a Tournament.");
            return redirect()->back();
        }
        if ($tournament->hasTeam($team)) {
            Flash::error("Your team has already entred the following Tournament.");
            return redirect()->back();
        }
        $tournament->teams()->save($team);
        Flash::success("Your Team has successfully entred the Tournament");
        return redirect()->back();
    }

    /**
     * @param $tournamentId
     * @return \Illuminate\View\View
     */
    public function teams($tournamentId)
    {
        $tournament = Tournament::findOrFail($tournamentId);
        return view('tournaments.teams', compact($tournament, $tournament));
    }

}
