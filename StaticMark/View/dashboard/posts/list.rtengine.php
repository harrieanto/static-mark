@extend('dashboard/posts/layouts/list')

@section('flash')
	@if(isset($flash))
		<div class="col-12">
			<center>
				<span class="outlined-button disabled text-redlighter">@{{ $flash }}</span>
			</center>
		</div>
	  @endif
@stop

@section('post-table')
	@{{ if(isset($post) && $post->isAvailable()):|unechoable }}

  	@{{ $no = 1|unechoable }}
  	@{{ $posts = $post->getPageItems()->all()|unechoable }}

  	@foreach($posts as $items)
  		<tr>
			<td>@{{ $no }}</td>
			<td>@{{ $items['heading'] }}</td>
			<td>@{{ $items['slug'] }}</td>
			<td>
				<a href="@{{ $delete = route('dashboard.post.delete', $items['slug']) }}">
					<span class="icon ion-ios-trash-outline"></span>
				</a>
			</td>
		</tr>
		@{{ $no++|unechoable }}
		@endforeach
  	@{{ endif;|unechoable }}
@stop

@section('no-content')
	@if(isset($post) && !$post->isAvailable())
		<div class="text-center"><h3 class="text-blacklighter">No Content Can be Manage</h3></div>
	@endif
@stop

@section('pagination')
	@{{ $route = route('dashboard.post.page')|unechoable }}

	@{{ if(isset($post) && $post->getTotalPage() > 1):|unechoable }}
	<div class="container margin-top">
  		@if($post->getPreviousPosition() !== null)
  		<a href="@{{ $route = route('dashboard.post.page', $post->getPreviousPosition()) }}" class="rounded-button text-redlighter">@{{ $post->getPreviousMarker() }}</a>
  		@endif
  		
  		@foreach($post->getNumberListMarker() as $number)
  		<a href="@{{ $route = route('dashboard.post.page', $number) }}" class="outlined-button text-blacklighter">@{{ $number }}</a>
  		@endforeach
  		
  		@if($post->getNextPosition() !== null)
  		<a href="@{{ $route = route('dashboard.post.page', $post->getNextPosition()) }}" class="rounded-button text-redlighter">@{{ $post->getNextMarker() }}</a>
  		@endif
  </div>
  @{{ endif;|unechoable }}
@stop