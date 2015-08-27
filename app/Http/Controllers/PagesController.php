<?php

namespace IAmLegend\Http\Controllers;

use IAmLegend\Http\Requests;
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

}
