@extend('blog/layouts/fixed-footer')

@section('index')
    <div class="blank-space"></div>
        <footer class="container-fixed footer-fixed">
            <div class="container-fluid">
                <div class="container-fluid margin-top-64">
                    @if(isset($post) || isset($advert))
                        @component('blog/posts/read|post-advert-direct')
                    @endif
                    <div class="container-fluid bottom-left" style="bottom: 24px;">
                        <div class="row">
                            <div class="col-4 link text-center">
                                <a href="@{{ $creator = route('harrieanto') }}" class="text-black">Meet Creator</a>
                            </div>
                            <div class="col-4 link text-center">
                                <span class="text-black">@{{ $copy = app_env('APP_COPYRIGHT') }}</span>
                            </div>
                    		<div class="col-2 link text-center">
                    			<a href="@{{ $waNumber }}" class="text-black">+@{{ $wa = app_env('APP_CONTACT') }}</a>
                    		</div>
                      	</div>
                    </div>
                </div>
            </div>
        </footer>
@stop