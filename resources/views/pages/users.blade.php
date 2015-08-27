@extends ('layouts.master')

@section ('content')

    <h1>All Users </h1>
    <hr>

    @foreach ($users->chunk(4) as $userSet)
        <div class="row users">
            @foreach ($userSet as $user)
                <div class="col-md-3 user-block">
                    @include ('partials.avatar', ['size ' => 60])
                    <h4 class="user-block-name">
                        <a href="{{ URL::route('profile_path', studly_case($user->name)) }}">{{ $user->name }}</a>
                    </h4>
                </div>
            @endforeach
        </div>
    @endforeach

    {!! $users->render() !!}

@stop