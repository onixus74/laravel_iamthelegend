@extends('layouts.master')


@section('content')

    <div class="container">
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Start Time</td>
            <td></td>
        </tr>
        </thead>
        <tbody>
        @foreach($tournaments as $key => $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->start_time }}</td>
                <td>
                    <a class="btn btn-small btn-success" href="{{ URL::to('tournaments/' . $value->id) }}">More Info</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>

@stop
