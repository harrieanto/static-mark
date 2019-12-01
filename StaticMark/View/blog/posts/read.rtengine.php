@extend('blog/posts/layouts/read')

@section('advert-property')
	@if($readPost->has('advert') && !empty($readPost->get('advert')))
		@{{ $advert = $readPost->get('advert')|unechoable }}
		@{{ $adCta = $advert['cta']|unechoable }}
		@{{ $adContact = $advert['contact']|unechoable }}
		@{{ $adImage = $advert['image']|unechoable }}
		@{{ $adCopywriting = $advert['description']|unechoable }}
	@endif
@stop

@section('post-header')
	@{{ $heading = $readPost->get('heading')|unechoable }}
	@{{ $author = $readPost->get('creator')['name']|unechoable }}
	@{{ $createdAt = $readPost->get('created_at')|unechoable }}
	@{{ $postImage = $readPost->get('highlight_image')|unechoable }}
	
	<div class="container-fluid text-white margin-top">
	  <div data-image="@{{ $postImage }}"></div>
	  <div class="overlay bg-blacklighter"></div>
	  <div class="row margin-bottom text-white">
	    <h1 class="text-white">@{{ $heading }}</h1>
	    @{{ $postedBy }} <a href="/@{{ $author }}" class="link text-red">@{{ $author }}</a> on @{{ $createdAt }}
	  </div>
	  <div class="container">
	    @component('post-advert-mini')
	  </div>
	</div>
@stop

@section('post-advert-mini')
	@if($readPost->has('advert') && !empty($readPost->get('advert')))			
		<div class="col-12 round-medium">
			<div class="container row round-medium margin-bottom">
				<div class="container row text-whitelighter triangle-top bg-whitelighter round-medium">
					<div class="col-6-sm margin-top margin-bottom">
						<img src="@{{ $adImage }}" class="img-responsive round-medium" width=200 height=200/>
					</div>
					<div class="col-6-sm">
						<p class="text-black text-medium text-left">
							@{{ $adCopywriting }}
							<p class="text-left"><a href="@{{ $adContact }}" class="text-red text-medium link">@{{ $adCta }}</a></p>
						</p>
					</div>
				</div>
			</div>
		</div>
	@endif
@stop

@section('post-advert-wide')
	@if($readPost->has('advert') && !empty($readPost->get('advert')))
		<div class="alert row bg-semiclouds round-medium">
			<div class="alert-close-button text-white">
				<span class="text-black text-xxlarge">&times;</span>
			</div>
			<div class="col-12 round-medium right margin-bottom">
				<div class="col-6-sm margin-top margin-bottom">
					<img src="@{{ $adImage }}" class="img-responsive round-medium" width=200 height=200/>
				</div>
				<div class="col-6-sm">
					<p class="text-black text-medium">@{{ $adCopywriting }}</p>
					<a href="@{{ $adContact }}" class="text-red text-medium text-center link">@{{ $adCta }}</a>
				</div>
			</div>
		</div>
	@endif
@stop

@section('post-advert-direct')
	@if(isset($readPost) && $readPost->has('advert') && !empty($readPost->get('advert')))
		@{{ $advert = $readPost->get('advert')|unechoable }}
		@{{ $adCta = $advert['cta']|unechoable }}
		@{{ $adTitle = $advert['title']|unechoable }}
		@{{ $adImage = $advert['image']|unechoable }}
		@{{ $adContact = $advert['contact']|unechoable }}
		@{{ $adCopywriting = $advert['description']|unechoable }}
	@endif
	
	@if(!isset($readPost) && isset($advert))
		@{{ $advert = $advert['advert']|unechoable }}
		@{{ $adCta = $advert['cta']|unechoable }}
		@{{ $adTitle = $advert['title']|unechoable }}
		@{{ $adImage = $advert['image']|unechoable }}
		@{{ $adContact = $advert['contact']|unechoable }}
		@{{ $adCopywriting = $advert['description']|unechoable }}
	@endif
	
	<div class="row">
		<div class="col-12 text-center">
			<span class="text-black text-xxxlarge font-heavy">@{{ $adTitle }}</span>
		</div>
		<div class="col-6-sm margin-top-24">
			<img src="@{{ $adImage }}" class="img-responsive right round-medium" width=250 height=350/>
		</div>
		<div class="col-6-sm margin-top">
			<p class="text-black text-medium text-left">
				@{{ $adCopywriting }}
				<p class="text-red text-medium link">@{{ $adCta }}</p>
			</p>
			<a href="@{{ $adContact }}" class="link-overlay"></a>
		</div>
  </div>
@stop

@section('post-content')
	@{{ $readPost->get('post') }}
	@{{ $hashtag = implode(', ', $readPost->get('tag'))|unechoable }}

	<div class="sharer margin-top-32 margin-bottom-32">
	  <div class="sharer-panel">
	    <button class="button bg-belizehole text-white" data-sharer="facebook" data-hashtag="@{{ $h = explode(', ', $hashtag)[0] }}" data-url="@{{ $readPost->get('url') }}"><i class="ion-social-facebook text-white margin-right"></i>Share on Facebook</button>
	    <button class="button bg-blue text-white" data-sharer="twitter" data-hashtag="@{{ $hashtag }}" data-title="@{{ $title }}" data-via="@@{{ $readPost->get('creator')['name'] }}" data-url="@{{ $readPost->get('url') }}"><i class="ion-social-twitter text-white margin-right"></i>Share on Twitter</button>
	    <button class="button bg-belizehole text-white" data-sharer="linkedin" data-url="@{{ $readPost->get('url') }}"><i class="ion-social-linkedin text-white margin-right"></i>Share on Linkedin</button>
	    <button class="button bg-greensea text-white" data-sharer="whatsapp" data-title="@{{ $title }}" data-url="@{{ $readPost->get('url') }}"><i class="ion-social-whatsapp text-white margin-right"></i>Share on Whatsapp</button>
	    <button class="button bg-greensea text-white" data-sharer="evernote" data-title="@{{ $title }}" data-url="@{{ $readPost->get('url') }}">Share on Evernote</button>
	  </div>
	</div>
	
	<div class="margin-top-32 margin-bottom-32">
	 <div id="disqus_thread"></div>
	</div>
@stop

@section('post-tag')
	@{{ $tagList = $readPost->get('tag')|unechoable }}

	@foreach($tagList as $slug => $tag)
		<a href="@{{ $route = route('blog.tag', $slug) }}" class="outlined-button text-blacklighter"> @{{ $tag }} </a>
	@endforeach
@stop

@section('post-author')
		@{{ $creators = $readPost->get('creator')|unechoable }}
		<div class="row bg-semiclouds margin-top margin-bottom round-medium triangle-top text-semiclouds">
			<div class="col-5-sm">
				<img src="@{{ $creators['picture'] }}" class="img-responsive round-large margin-top margin-bottom" width=250 height=250/>
			</div>
			<div class="col-7-sm">
				<div class="margin-top margin-bottom">
					<a href="@{{ $creators['site'] }}" class="link text-red">
						@{{ $creators['name'] }}
					</a>
				</div>
				<p class="text-medium">@{{ $creators['about'] }}</p>
			</div>
		</div>
@stop