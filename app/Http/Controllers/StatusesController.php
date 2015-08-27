<?php namespace IAmLegend\Http\Controllers;

use IAmLegend\Http\Requests\CreateStatusForm;
use Auth;
use IAmLegend\Status;
use Illuminate\Http\Request;

use IAmLegend\Http\Requests;
use IAmLegend\Http\Controllers\Controller;
use Laracasts\Flash\Flash;
use Redirect;

class StatusesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        // Grab the statuses related to the current user only
        //$statuses = Auth::user()->statuses()->with('user')->latest()->get();
        // Grab the statuses related to the current user and the users he
        $userIds = Auth::user()->followedUsers()->lists('followed_id')->all();
        $userIds[] = Auth::user()->id;
        $statuses = Status::with('comments')->whereIn('user_id',$userIds)->latest()->get();
        return view('pages.statuses', compact('statuses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateStatusForm  $request
     * @return Response
     */
    public function store(CreateStatusForm $request)
    {
        Auth::user()
            ->statuses()
            ->save(
                new Status(
                    $request->only('body')
                )
            );

        Flash::success('Your Status has been updated !');

        return Redirect::back();
    }
}
