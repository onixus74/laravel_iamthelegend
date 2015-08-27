<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    {!! HTML::script('//code.jquery.com/jquery-1.11.3.min.js') !!}
    {!! HTML::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css') !!}
    {!! HTML::style('https://cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.5/flatly/bootstrap.min.css') !!}
    {!! HTML::style('https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css') !!}
    {!! HTML::style('//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css') !!}
    {!! HTML::style('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.0/css/bootstrap-datepicker.min.css') !!}
    {!! HTML::style('//cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.css') !!}
    {!! HTML::style('//select2.github.io/select2/select2-3.5.2/select2.css') !!}
    {!! HTML::style('css/select2-bootstrap.css') !!}
    {!! HTML::style('css/gh-pages.css') !!}
    {!! HTML::style('css/app.css') !!}
    {!! HTML::style('css/card.css') !!}
    <title>LaraBook</title>
</head>
<body>

@include('partials.navbar')

<div class="container container-fluid">
    <div class="row">
        @include ('flash::message')
        @yield('content')
    </div>
</div>
{!! HTML::script('//code.jquery.com/jquery-migrate-1.2.1.min.js') !!}
{!! HTML::script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js') !!}
{!! HTML::script('https://twitter.github.io/typeahead.js/releases/latest/typeahead.bundle.js') !!}
{!! HTML::script('https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/3.0.3/handlebars.min.js') !!}
{!! HTML::script('https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.6/jquery.slimscroll.js') !!}
{!! HTML::script('//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js') !!}
{!! HTML::script('//cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.js') !!}
{!! HTML::script('//select2.github.io/select2/select2-3.5.2/select2.js') !!}
{!! HTML::script('https://cdnjs.cloudflare.com/ajax/libs/blueimp-md5/1.1.1/js/md5.min.js') !!}
{!! HTML::script('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.0/js/bootstrap-datepicker.min.js') !!}
{!! HTML::script('js/app.js') !!}
</body>
</html>