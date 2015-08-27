@if ($statuses->count())
    @include ('partials.status')
@else
    <p>This User hasn't yet posted any statuses.</p>
@endif