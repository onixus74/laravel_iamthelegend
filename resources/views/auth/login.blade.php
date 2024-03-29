@extends('layouts.master')

@section('content')

    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Register</div>
            <div class="panel-body">
                @if (count($errors) > 0)
                    @include('partials.errors')
                @endif

                <form class="form-horizontal" role="form" method="POST" action="/auth/login">
                    {!! csrf_field() !!}

                    <div class="form-group">
                        <label for="" class="col-md-4 control-label">Email-Address :</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="email" value="{{old('email')}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-md-4 control-label">Password :</label>

                        <div class="col-md-6">
                            <input type="password" class="form-control" name="password" value="{{old('password')}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember"> Remember Me
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">Login</button>

                            <a class="btn btn-link" href="{{ url('/password/email') }}">Forgot Your Password?</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

@stop