<?php

namespace IAmLegend\Http\Controllers;

use IAmLegend\User;
use Illuminate\Http\Request;

use IAmLegend\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Laracasts\Flash\Flash;

class FollowersController extends Controller
{

    /**
     * Follow a user
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {

        $user = User::findOrFail(Auth::id());

        $user->followedUsers()->attach($request->get('userIdToFollow'));

        Flash::success('You are now Following this user.');

        return Redirect::back();

    }


    /**
     * Unfollow a user
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail(Auth::id());

        $user->followedUsers()->detach(Input::get('userIdToUnfollow'));

        Flash::success("You are no longer following this user.");

        return Redirect::back();
    }
}
