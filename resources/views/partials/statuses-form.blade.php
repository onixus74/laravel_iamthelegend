@include ('partials.errors')

<div class="status-post">
    {!!  Form::open(['route' => 'statuses_store_path']) !!}

    <div class="form-group">
        {!! csrf_field() !!}
        {!! Form::textarea('body',null, ['class' => 'form-control', 'placeholder' => 'What\'s On Your Mind ...']) !!}
    </div>

    <div class="form-group status-post-submit">
        <button class="btn btn-default btn-xs"><i class="glyphicon glyphicon-edit"></i> Submit Your Status</button>
    </div>

    {!! Form::close() !!}
</div>