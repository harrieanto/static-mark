@extend('blog/posts/layouts/list')

@section('post-list')
	@if(!$post->isAvailable())
		<div class="text-center"><h3 class="text-blacklighter">Sorry, Blog Content Not Yet Available</h3></div>
	@endif

	@{{ $itemList = $post->getPageItems()->all()|unechoable }}

	@foreach($itemList as $items)
		<div>
			<a href="@{{ $route = route('blog') }}/@{{ $items['slug'] }}" class="link"><h1 class="link">@{{ $items['heading'] }}</h1></a>
			<div class="row">@{{ $postedBy }} <a href="/@{{ $items['creator']['name'] }}" class="link text-red">@{{ $items['creator']['name'] }}</a> on @{{ $items['created_at'] }}</div>
			<div class="margin-top">@{{ $items['highlight'] }}</div>
		</div>
		
		@{{ foreach($items['tag'] as $slug => $tag):|unechoable }}
			<a href="@{{ $route = route('blog.tag', $slug) }}" class="outlined-button text-blacklighter"> @{{ $tag }} </a>
		@{{ endforeach;|unechoable }}
	@endforeach

	@{{ if($post->getTotalPage() > 1):|unechoable }}
	<div class="container margin-top-64">
  		<ul class="pagination">
  		    <li>
  		        <ul>
            		@if(($previous = $post->getPreviousPosition()) !== null)
            		  <li class="bg-red"><a href="@{{ $route = route('blog.page', $previous) }}"><span class="text-white">@{{ $post->getPreviousMarker() }}</span></a></li>
            		@endif
            		
            		@foreach($post->getNumberListMarker() as $number)
            		  @if(is_int($number))
            		    <li class="bg-semiclouds"><a href="@{{ $route = route('blog.page', $number) }}"><span class="text-red">@{{ $number }}</span></a></li>
            		  @endif
  		  
            		  @if(is_string($number))
            		    <li class="bg-semiclouds disabled"><a href="@{{ $route = route('blog.page', $number) }}"><span class="text-red disabled">@{{ $number }}</span></a></li>
            		  @endif
            		@endforeach
            		
            		@if(($next = $post->getNextPosition()) !== null)
            		  <li class="bg-red"><a href="@{{ $route = route('blog.page', $next) }}"><span class="text-white">@{{ $post->getNextMarker() }}</span></a></li>
            		@endif
  		        </ul>
  		    </li>
  		</ul>
  </div>
  @{{ endif;|unechoable }}
@stop