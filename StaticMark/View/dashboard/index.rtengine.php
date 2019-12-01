@extend('dashboard/layouts/index')

@section('meta-html')
	@component('partials/header|meta-html')
@stop

@section('icon')
	@component('partials/header|icon')
@stop

@section('css')
	@component('partials/header|stylesheet')
@stop

@section('content-nav')
	@{{ $view('blog/nav')|unechoable }}
@stop

@section('header')
	@{{ $view('blog/header')|unechoable }}
@stop

@section('content')
	@if(isset($post))
		@{{ $view('dashboard/posts/list')|unechoable }}
	@endif

	@if(isset($login))
		@{{ $view('dashboard/login')|unechoable }}
	@endif
@stop

@section('footer')
	@{{ $view('dashboard/footer')|unechoable }}
@stop

@section('javascript')
	@{{ $view('partials/js')|unechoable }}
@stop