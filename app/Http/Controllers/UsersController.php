<?php

namespace IAmLegend\Http\Controllers;

use IAmLegend\Http\Requests\Request;
use IAmLegend\User;
use Illuminate\Http\Response;
use Input;

class UsersController extends Controller
{

    /**
     * Fetch A User By their Name
     * @param $name
     */
    public function show($name)
    {

        $Name = implode(' ', splitUpercase($name));

        $user = User::with('statuses')->whereName($Name)->first();

        return view('pages.profile')->withUser($user);

    }

    public function search()
    {
        $query = Input::get('user');
        $res = User::where('name', 'LIKE', "%$query%")->get();
        return response()->json($res);
    }

    public function usersToBeAdded()
    {
        $query = Input::get('q');
        $res = User::where('name', 'LIKE', "%$query%")->where('current_team', '=', 'null')->get();
        return response()->json(['items' => $res]);
    }

}