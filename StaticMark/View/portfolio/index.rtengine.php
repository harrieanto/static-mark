@extend('portfolio/layouts/index')

@section('meta-html')
	@component('partials/header|meta-html')
@stop

@section('icon')
  <link rel="icon" href="/public/images/portfolio/hy.png" type="image/png">
  <link rel="apple-touch-icon" href="/public/images/portfolio/hy.png">
  <link rel="apple-touch-icon" sizes="76x76" href="/public/images/portfolio/hy.png">
  <link rel="apple-touch-icon" sizes="120x120" href="/public/images/portfolio/hy.png">
  <link rel="apple-touch-icon" sizes="152x152" href="/public/images/portfolio/hy.png">
@stop

@section('css')
	@component('partials/header|stylesheet')
@stop

@section('content-nav')
	@{{ $view('blog/nav') }}
@stop

@section('header')
	@{{ $view('blog/header') }}
@stop

@section('content')
	@{{ $view('portfolio/content') }}
@stop

@section('javascript')
	@{{ $view('partials/js')|unechoable }}
@stop