@if (Auth::check())
    @if (!$user->isFriendsWith(Auth::user()))
        {!! Form::open(['route' => 'add_friend_path', 'method' => 'POST' ]) !!}
        {!! Form::hidden('userIdToAddFriend', $user->id) !!}
        <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-user-plus"></i>
            Add {{ $user->name }}</button>
        {!! Form::close() !!}
    @endif
@endif