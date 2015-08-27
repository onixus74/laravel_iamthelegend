<?php

namespace IAmLegend\Http\Controllers;

use IAmLegend\User;
use Illuminate\Http\Request;

use IAmLegend\Http\Requests;
use IAmLegend\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;
use Redirect;

class FriendsController extends Controller
{
    public function requestFriendship(Request $request)
    {
        $userToBeFriend = User::findOrFail($request->get('userIdToAddFriend'));

        Auth::user()->befriend($userToBeFriend);

        Flash::success("{$userToBeFriend->name} will shorly be receiving an invitation.");

        return Redirect::back();
    }

    public function acceptFriendship(Request $request)
    {
        $userToAcceptFrienship = User::findOrFail($request->get('userIdToAcceptFriendship'));

        Auth::user()->acceptFriendRequest($userToAcceptFrienship);

        return Redirect::back();

    }

    public function denyFriendship($senderId)
    {
        $userToDenyFrienship = User::findOrFail($senderId);

        Auth::user()->denyFriendRequest($userToDenyFrienship);

        return Redirect::back();
    }

}
