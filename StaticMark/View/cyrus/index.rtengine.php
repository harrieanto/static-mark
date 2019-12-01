@extend('cyrus/layouts/index')

@section('meta-html')
	@component('partials/header|meta-html')
@stop

@section('icon')
  <link rel="icon" href="/public/images/cyrus/cyrus_logo.png" type="image/png">
  <link rel="apple-touch-icon" href="/public/images/cyrus/cyrus_logo.png">
  <link rel="apple-touch-icon" sizes="76x76" href="/public/images/cyrus/cyrus_logo.png">
  <link rel="apple-touch-icon" sizes="120x120" href="/public/images/cyrus/cyrus_logo.png">
  <link rel="apple-touch-icon" sizes="152x152" href="/public/images/cyrus/cyrus_logo.png">
@stop

@section('css')
	@component('partials/header|stylesheet')
@stop

@section('header')
	@{{ $view('cyrus/header') }}
@stop

@section('content')
	@{{ $view('cyrus/content') }}
@stop

@section('fixed-footer')
    @{{ $view('cyrus/fixed-footer') }}
@stop

@section('javascript')
	<script src="/public/js/cyrus.min.js"></script>
@stop