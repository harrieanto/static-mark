@extend('blog/layouts/index')

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

@section('page-identifier')
	<li><a href="/"><span class="icon ion-ios-home"></span></a></li>

	@if(isset($currentPages))
		@{{ if(is_array($currentPages)):|unechoable }}
			@{{ foreach($currentPages as $link => $identifier):|unechoable }}
				@{{ if(is_string($link)):|unechoable }}
					<li><a href="@{{ $link }}">@{{ $identifier }}</a></li>
				@{{ endif;|unechoable }}

				@{{ if(!is_string($link)):|unechoable }}
					<li><a href='javascript:;' class="disabled">@{{ $identifier }}</a></li>
				@{{ endif;|unechoable }}
			@{{ endforeach;|unechoable }}
		@{{ endif;|unechoable }}

		@{{ if(!is_array($currentPages)):|unechoable }}
			<li><a href='javascript:;' class="disabled">@{{ $currentPages }}</a></li>
		@{{ endif;|unechoable }}
	@endif
@stop

@section('content')
	@if(isset($home))
		@{{ $view('blog/home')|unechoable }}
	@endif
	
	@if(isset($post))
		@{{ $view('blog/posts/list')|unechoable }}
	@endif

	@if(isset($readPost))
		@{{ $view('blog/posts/read')|unechoable }}
	@endif

	@if(isset($tag))
		@{{ $view('blog/posts/tag')|unechoable }}
	@endif
@stop

@section('fixed-footer')
	@{{ $view('blog/fixed-footer')|unechoable }}
@stop

@section('javascript')
	@{{ $view('partials/js')|unechoable }}
@stop