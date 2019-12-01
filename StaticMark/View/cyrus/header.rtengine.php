@extend('cyrus/layouts/header')

@section('site-link')
  @{{ $host = app_env('APP_HOST')|unechoable }}
  <img src="/public/images/cyrus/sabun_cyrus_transparent.png" width=25 height=25 class="margin-right"/><a href="@{{ $host }}" class="link text-black header-link">@{{ $name = app_env('APP_NAME') }}@{{ $appSubName }}</a>
@stop