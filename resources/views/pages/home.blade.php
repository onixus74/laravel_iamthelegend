@extends('layouts.master')

@section('content')

    <div class="jumbotron">
    	<div class="container">
    		<h1>Welcome To Larabook !</h1>
    		<p>Welcome to the premier to talk about Laravel with Others.
            Why don't you sign up to see what all the fuss is about ?</p>
    		@if ( !Auth::check() )
				<p>
					<a href="{{ url('auth/register') }}" class="btn btn-primary btn-md"><i class="glyphicon glyphicon-user"></i> Sign Up !</a>
				</p>
			@endif
    	</div>
    </div>

@stop