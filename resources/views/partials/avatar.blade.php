<a href="{{ URL::route('profile_path', studly_case($user->name)) }}" class="{{ (Route::currentRouteName() == 'profile_path') || (Route::currentRouteName() == 'statuses_path') ? 'media-left' : '' }}">
    <img class="media-object avatar" src="{{ $user->present()->gravatar($user->email, isset($size) ? $size : 60) }}"
         alt="{{ $user->name }}">
</a>