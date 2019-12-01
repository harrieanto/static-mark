@extend('portfolio/layouts/header')

@section('site-link')
    @{{ $host = app_env('APP_HOST')|unechoable }}
    <a href="@{{ $host }}" class="link text-red header-link">@{{ $name = app_env('APP_NAME') }}@{{ $appSubName }}</a>
@stop

@section('site-search')
    @{{ $view('blog/finder')|unechoable }}
@stop