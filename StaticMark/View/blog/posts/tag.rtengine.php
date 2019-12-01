@extend('blog/posts/layouts/tag')

@section('tag-list')
	@if(!$tag->isAvailable())
		<div class="text-center"><h3 class="text-blacklighter">@{{ $contentNotFound }}</h3></div>
	@endif

	@{{ $itemList = $tag->getPageItems()->all()|unechoable }}

	@foreach($itemList as $items)
		<div>
			<a href="@{{ $route = route('blog.tag.read', $currentTag, $items['slug']) }}" class="link"><h1 class="link">@{{ $items['heading'] }}</h1></a>
			<div class="row">@{{ $postedBy }} <a href="/@{{ $items['creator']['name'] }}" class="link text-red">@{{ $items['creator']['name'] }}</a> on @{{ $items['created_at'] }}</div>
			<div class="margin-top">@{{ $items['highlight'] }}</div>
		</div>
	@endforeach

	@{{ if($tag->getTotalPage() > 1):|unechoable }}
	<div class="container margin-top">
  		@if(($previous = $tag->getPreviousPosition()) !== null)
  		  <a href="@{{ $route = route('blog.tag.page', $currentTag, $previous) }}" class="rounded-button text-redlighter">@{{ $tag->getPreviousMarker() }}</a>
  		@endif
  		
  		@foreach($tag->getNumberListMarker() as $number)
  		  <a href="@{{ $route = route('blog.tag.page', $currentTag, $number) }}" class="outlined-button text-blacklighter">@{{ $number }}</a>
  		@endforeach
  		
  		@if(($next = $tag->getNextPosition()) !== null)
  		  <a href="@{{ $route = route('blog.tag.page', $currentTag, $next) }}" class="rounded-button text-redlighter">@{{ $tag->getNextMarker() }}</a>
  		@endif
  </div>
  @{{ endif;|unechoable }}
@stop