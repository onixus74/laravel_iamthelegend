<?php

namespace IAmLegend\Http\Controllers;

use IAmLegend\Comment;
use IAmLegend\User;
use Illuminate\Http\Request;

use IAmLegend\Http\Requests;
use IAmLegend\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Redirect;

class CommentsController extends Controller
{
    /**
     * Store a new Comment
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $comment = new Comment();
        $comment->body = $request->body;
        $comment->status_id = $request->statusId;

        User::findOrFail(Auth::id())->comments()->save($comment);

        return Redirect::back();

    }

}
