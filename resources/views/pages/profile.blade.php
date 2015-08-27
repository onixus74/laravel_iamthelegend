@extends ('layouts.master')

@section ('content')

    <div class="row">
        <div class="col-md-3">
            <div class="media">
                <div class="media-left">
                    @include ('partials.avatar', ['size' => 50])
                </div>
                <div class="media-body">
                    <h3 class="media-heading">{{ $user->name }}</h3>
                    <p class="text-muted">
                        {{ $user->present()->statusCount() }}
                    </p>
                    @unless($user->is(Auth::user()))
                        @include ('partials.addfriend')
                    @endunless
                </div>
            </div>
        </div>
        <div class="col-md-6">
            @if ($user->is(Auth::user()))
                @include ('partials.statuses-form')
            @endif
            @include ('partials.statuses', ['statuses' => $user->statuses])
        </div>
    </div>

@stop