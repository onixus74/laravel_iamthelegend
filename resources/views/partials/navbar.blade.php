<nav class="navbar navbar-default" role="navigation">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="{{ Auth::check() ? route('statuses_path') : route('home') }}">Larabook </a>
	</div>
	<div class="collapse navbar-collapse navbar-ex1-collapse">
		<ul class="nav navbar-nav">
			<li class="{{ Route::is('browse_users') ? 'active' : '' }}"><a href="{{ URL::route('browse_users') }}"><i class="fa fa-users"></i> Browse Users</a></li>
            <li class="{{ Route::is('') ? 'active' : '' }}"><a href="{{ URL::Route('tournament_path') }}"><i class="fa fa-sitemap"></i> Tournaments</a></li>
		</ul>
        {!! Form::open(['url' => '/users', 'method' => 'get', 'class' => 'navbar-form navbar-left']) !!}
        <div class="form-group">
            {!! Form::text('user', null, ['id'=>'users', 'class' => 'form-control typeahead']) !!}
        </div>
        {!! Form::close() !!}
		<ul class="nav navbar-nav navbar-right">
			@if (Auth::check())
                @include ('partials.notifications')
                @include ('partials.teams_invitations')
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img class="gravatar" src="{{ Auth::user()->present()->gravatar(Auth::user()->email, 30) }}" alt="{{ Auth::user()->name }}">
                        {{ Auth::user()->name }}<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('profile_path', studly_case(Auth::user()->name)) }}"><i class="fa fa-user"></i> Profile</a></li>
                        <li><a href="{{ route('my_teams_path', studly_case(Auth::user()->name)) }}"><i class="fa fa-users"></i> My Teams</a></li>
                        <li><a href="{{ route('my_tournaments_path', studly_case(Auth::user()->name)) }}"><i class="fa fa-sitemap"></i> My Tournaments</a></li>
                        <li class="divider"></li>
                        <li><a href="{{ url('auth/logout') }}"><i class="fa fa-lock"></i> Logout</a></li>
                    </ul>
                </li>
            @else
                <li><a href="{{ url('auth/login') }}">Login</a></li>
                <li><a href="{{ url('auth/register') }}">Register</a></li>
			@endif
		</ul>
	</div>
</nav>