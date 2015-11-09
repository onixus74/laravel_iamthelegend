@extends('layouts.master')


@section('content')

    <div class="container">
        <table class="table table-striped table-bordered" id="table">
            <thead>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Start Time</td>
                <td>Show/Edit</td>
            </tr>
            </thead>
            <tbody>
            @foreach($tournaments as $tournament)
                <tr>
                    <td>{{ $tournament->id }}</td>
                    <td>{{ $tournament->name }}</td>
                    <td>{{ $tournament->start_time->diffForHumans() }}</td>
                    <td>
                        <a class="btn btn-small btn-success" href="{{ URL::to('tournaments/' . $tournament->id) }}">Show</a>
                        <a class="btn btn-small btn-info" href="{{ URL::to('tournaments/' . $tournament->id . '/edit') }}">Edit</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@stop
