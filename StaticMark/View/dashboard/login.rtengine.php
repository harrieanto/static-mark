@extend('dashboard/layouts/login')

@section('flash')
      @if(isset($flash))
      <div class="col-12">
        <center>
          <span class="outlined-button disabled text-redlighter">@{{ $flash }}</span>
        </center>
      </div>
      @endif
@stop