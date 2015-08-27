<div class="media">
    <div class="media-left">
        @include ('partials.avatar', ['user' => $comment->owner, 'size' => 30])
    </div>
    <div class="media-body">
        <a href="{{ URL::route('profile_path', studly_case($status->user->name)) }}">
            <h6 class="media-heading">{{ $comment->owner->name }}</h6>
        </a>
        <p class="list-group-item-text">{{ $comment->body }}</p>
    </div>
</div>
