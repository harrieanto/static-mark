@yield('advert-property')

<div class="container-fluid bg-black text-center">
  <div class="row">
    <div class="col-12">
      @yield('post-header')
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="container">
      <div class="col-12">
        <div class="padding-medium">
          @yield('post-content')
          @yield('post-advert-wide')
          @yield('post-tag')
          @yield('post-author')
        </div>
      </div>
    </div>
  </div>
</div>