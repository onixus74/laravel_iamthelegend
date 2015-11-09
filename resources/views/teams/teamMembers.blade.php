@extends('layouts.master')

@section('content')
    {{ $disabled = true }}
    <div class="col-md-12">
        @if ($user->isOwnerOfTeam($team))
            <div class="panel panel-default">
                <div class="panel-heading">Invite Team Members : </div>
                <div class="panel-body">
                    {!! Form::open(['route' => ['addInvitationToTeam', studly_case(Auth::user()->name), $team->name],'class' => 'form-horizontal']) !!}
                    <div class="form-group">
                        <label for="" class="col-md-4 control-label">Member :</label>

                        <div class="col-md-6">
                            <select name="member" class="form-control leader">
                                @foreach ($user->getAcceptedFriendships() as $friend)
                                    @if(!in_array($friend->recipient_id, $accepted))
                                        {{ $disabled = false }}
                                        <option value="{{ $friend->recipient->id }}">{{ $friend->recipient->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-sm btn-success" {{ ($disabled) ? 'disabled' : '' }}>
                                <i class="glyphicon glyphicon-plus"></i>
                                Send Invitation
                            </button>
                        </div>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        @endif
    </div>

    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Team Members :</div>
            <div class="panel-body">
                <ul class="list-group">
                    @foreach ($team->members as $member)
                        <li class="list-group-item">
                            <span class="badge">
                                <a href="">
                                    <i class="fa fa-eye"></i>
                                </a>
                            </span> {{ $member->name }}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@stop
