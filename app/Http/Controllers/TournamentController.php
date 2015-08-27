<?php

namespace IAmLegend\Http\Controllers;

use IAmLegend\Tournament;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Input;
use IAmLegend\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use \Session;

class TournamentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        $tournaments = Tournament::all();
        return view('tournaments.index')->with('tournaments', $tournaments);
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
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'name'       => 'required',

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
            $tournament->start_time = Input::get('start_time');
            $tournament->save();

            // redirect
            Session::flash('message', 'Successfully created Tournament!');
            return Redirect::to('tournaments');
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
