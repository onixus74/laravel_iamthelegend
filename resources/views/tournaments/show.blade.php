@extends('layouts.master')


@section('content')
    <div class="container">

        <nav class="navbar navbar-inverse">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ URL::to('tournaments') }}">Tournament Alert</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::to('tournaments') }}">View All Tournaments</a></li>
                <li>
                    {!! Form::open(['route' => ['tournament_subscription', $tournament->id]]) !!}
                        <button type="submit" class="btn btn-success">Subscribe</button>
                    {!! Form::close() !!}
                </li>
            </ul>
        </nav>

        <h1>Showing {{ $tournament->name }}</h1>

        <div class="jumbotron text-center">
            <h2>{{ $tournament->name }}</h2>

            <p>
                <strong>Starting in :</strong> {{ $tournament->start_time }}<br>
                {{--<strong>Level:</strong> {{ $nerd->nerd_level }}--}}
            </p>
        </div>

    </div>

@stop
