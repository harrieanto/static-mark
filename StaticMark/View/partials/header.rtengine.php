@extend('partials/layouts/header')

@section('meta-html')
  <meta charset="utf-8">
  <meta name="csrf-token" content="@{{ $csrfToken }}">
  <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
  <meta content="width=device-width,initial-scale=1.0" name="viewport">
  @{{ $meta }}
@stop

@section('icon')

@stop

@section('stylesheet')
  <link rel="stylesheet" type="text/css" href="/public/css/bandd.min.css"/>
@stop