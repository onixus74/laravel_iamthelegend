<?php

namespace IAmLegend\Http\Controllers;

use Chumper\Datatable\Datatable;
use IAmLegend\Http\Requests;
use IAmLegend\Tournament;
use IAmLegend\User;

class PagesController extends Controller
{

    public function home()
    {
        return view('pages.home');
    }

    public function contact() {
        return view('pages.contact');
    }

    public function users()
    {
        $users = User::orderBy('name','asc')->paginate(25);
        return view('pages.users')->withUsers($users);
    }

    public function tournaments() {
        $tournaments = Tournament::orderBy('name', 'asc')->paginate(25);
        return view('pages.tournaments')->withTournaments($tournaments);
    }

}
