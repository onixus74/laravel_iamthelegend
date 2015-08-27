@extends ('layouts.master')

@section ('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            @include ('partials.statuses-form')
            &nbsp;
            @include ('partials.status')
        </div>
    </div>

@stop