@foreach ($statuses as $status)

    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading card">
                <div class="panel-title">
                    <div class="media">
                        @include ('partials.avatar', ['user' => $status->user])
                        <div class="media-body">
                            <h5 class="media-heading">{{ $status->user->name }}</h5>
                            <h6 class="text-muted"> Published {{ $status->present()->timeSincePublished() }}</h6>
                        </div>
                    </div>

                </div>
            </div>
            <div class="panel-body">
                <p>{{ $status->body }}</p>
            </div>
            <div class="panel-footer">
                @if( Auth::check() )
                    {!! Form::open(['route' => ['comment_path', $status->id], 'class' => 'form-horizontal comment-form']) !!}
                        {!! Form::hidden('statusId', $status->id) !!}
                        <div class="media">
                            <a href="{{ URL::route('profile_path') }}" class="media-left">
                                <a href="{{ URL::route('profile_path', studly_case($status->user->name)) }}"
                                   class="{{ (Route::currentRouteName() == 'profile_path') || (Route::currentRouteName() == 'statuses_path') ? 'media-left' : '' }}">
                                    <img class="media-object avatar"
                                         src="{{ $status->user->present()->gravatar(Auth::user()->email, 45) }}"
                                         alt="{{ $status->user->name }}">
                                </a>
                            </a>

                            <div class="media-body">
                                {!! Form::textarea('body', null, ['class' => 'comment-post form-control', 'rows' => 1, 'placeholder' => 'Write your comment ...']) !!}
                                &nbsp;
                                @if( $comments = $status->comments )
                                    <ul class="comments list-group">
                                        @foreach ( $comments as $comment )
                                            <li class="list-group-item">
                                                @include ('partials.comment')
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        </div>
                    {!! Form::close() !!}
                @endif
            </div>
        </div>
    </div>

@endforeach