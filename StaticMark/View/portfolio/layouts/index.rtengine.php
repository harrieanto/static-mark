<!DOCTYPE html>
<html lang="@{{ $lang = app_env('APP_LANG') }}">
<head>
     <!-- Html meta name -->
	@yield('meta-html')
	<!-- The site icon -->
	@yield('icon')
     <!-- Stylesheet -->
    @yield('css')
</head>
<body>
    
    <div class="body-overlay bg-retro"></div>

    <div class="page-loader">
      <div class="loader-item">
        <div class="loading-circle"></div>
      </div>
    </div>
    
    <script>
      if (document.readyState == 'loading') {
        document.querySelector('.page-loader').style.display = 'block'
      }
    </script>

    <!-- Content conatiner -->
     <main>
        <!-- Content navigation -->
        <nav class="bg-white">
            @yield('content-nav')
        </nav>
        <!-- Main content -->
        <div class="main-content col-100-percent bg-white">
            <div class="col-100-percent">
        	    @yield('content')
        	</div>
        </div>
    </main>
</body>
<!-- Javascript -->
@yield('javascript')
</html>