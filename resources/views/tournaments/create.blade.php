
@extends('layouts.master')


@section('content')

    <h1>Create a New Tournament</h1>

    <!-- if there are creation errors, they will show here -->
    {!! HTML::ul($errors->all()) !!}

    {!! Form::open(array('url' => 'tournaments')) !!}

    <div class="form-group">
        {!! Form::label('name', 'Name') !!}
        {!! Form::text('name', Input::old('name'), array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!!Form::label('start_time', 'Start Time') !!}
        {{--{{Form::date('date',Input::old('startTime'), array('class' => 'form-control'))}}--}}
        {{--{!! Form::text('startTime','Start Time', ['id' => 'calendar']) !!}--}}
        {{--{!! Form::text('StartTime', '', array('class' => 'form-control','data-datepicker' => 'datepicker')) !!}--}}
        {!! Form::text('start_time', null, array('class' => 'form-control input-sm','placeholder' => 'Starting Date','data-provide' => 'datepicker')) !!}
    </div>


    {!! Form::submit('Create the Tournament!', array('class' => 'btn btn-primary')) !!}

    {!! Form::close() !!}
{{--Test commit--}}
    </div>

@stop


