@if (Auth::check())
    @if ($user->isFriend(Auth::user()))
        {!! Form::open(['method' => 'DELETE','route' => ['unfollows_path', $user->id ]]) !!}
        {!! Form::hidden('userIdToUnfollow', $user->id) !!}
        <button type="submit" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-minus"></i> Unfollow {{ $user->name }}</button>
        {!! Form::close() !!}
    @else
        {!! Form::open(['route' => 'follows_path', 'method' => 'POST' ]) !!}
        {!! Form::hidden('userIdToFollow', $user->id) !!}
        <button type="submit" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-plus"></i> Follow {{ $user->name }}</button>
        {!! Form::close() !!}
    @endif
@endif