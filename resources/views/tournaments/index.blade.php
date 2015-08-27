@extends('layouts.master')


@section('content')

    <div class="container">
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Start Time</td>
            <td>Show/Edit</td>
        </tr>
        </thead>
        <tbody>
        @foreach($tournaments as $key => $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->startTime }}</td>

                <!-- we will also add show, edit, and delete buttons -->
                <td>

                    <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                    <!-- we will add this later since its a little more complicated than the other two buttons -->

                    <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                    <a class="btn btn-small btn-success" href="{{ URL::to('tournaments/' . $value->id) }}">Show</a>

                    <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                    <a class="btn btn-small btn-info" href="{{ URL::to('tournaments/' . $value->id . '/edit') }}">Edit</a>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>

@stop
