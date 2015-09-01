@extends('layouts.master')


@section('content')

    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">My Teams</div>
            <div class="panel-body">
                <ul class="list-group">
                    @foreach ($teams as $team)
                        <li class="list-group-item">
                            <span class="badge">
                                <a href="{{ URL::route('user_team', [studly_case(Auth::user()->name), $team->name]) }}"><i
                                            class="fa fa-eye"></i></a>
                            </span> {{ $team->name }}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Create Your Team</div>
            <div class="panel-body">
                @if (count($errors) > 0)
                    @include('partials.errors')
                @endif
                {!! Form::open(['route' => ['create_team', studly_case(Auth::user()->name)],'class' => 'form-horizontal']) !!}

                <div class="form-group">
                    <label for="" class="col-md-4 control-label">Team Name :</label>

                    <div class="col-md-6">
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-md-4 control-label">Leader :</label>

                    <div class="col-md-6">
                        <input type="text" name="leader" class="form-control" value="{{ Auth::user()->name }}">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-plus"></i>
                            Create Team
                        </button>
                    </div>
                </div>


                {!! Form::close() !!}

            </div>
        </div>
    </div>

    @if (isActive('user_team'))
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Team Members</div>
                <div class="panel-body">
                    {!! Form::open(['route' => ['addInvitationToTeam', studly_case(Auth::user()->name), 'LesBlaireaux'],'class' => 'form-horizontal']) !!}
                            <!--<label for="select2-button-addons-single-input-group-sm" class="control-label">Select user to add :</label>
                <div class="input-group input-group-sm select2-bootstrap-prepend">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="button" data-select2-open="select2-button-addons-single-input-group-sm">
                            User
                        </button>
                    </div>
                    <input id="select2-button-addons-single-input-group-sm" type="hidden" class="form-control select2-remote">
                </div>-->

                    <div class="form-group">
                        <label for="" class="col-md-4 control-label">Member :</label>

                        <div class="col-md-6">
                            <select name="member" class="form-control leader">
                                @foreach ($friends as $friend)
                                    @if ($friend->current_team_id == null)
                                        <option value="{{ Auth::user()->find($friend->recipient_id)->id }}">{{ Auth::user()->find($friend->recipient_id)->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-sm btn-success"><i
                                        class="glyphicon glyphicon-plus"></i>
                                Send Invitation
                            </button>
                        </div>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    @endif

@stop
