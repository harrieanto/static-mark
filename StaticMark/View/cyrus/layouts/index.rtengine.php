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
        <!-- Main content -->
        <div class="main-content col-100-percent bg-white">
            <header data-scroll='scroll-top' style="position:absolute;top:0;width:100%;">
                @yield('header')
            </header>
        	@yield('content')
        </div>
    </main>

    <!-- Triangle SVG -->
    <div style="fill: #fff;position:relative;top:-0.2%;">
       	<svg xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 1950 150">
       		<path d="M 0,150 0,0 2000,0"></path>
       	</svg>
    </div>
     <!-- /Triangle SVG -->

     <!-- Fixed footer -->
    @yield('fixed-footer')

     <!-- Scroll to top navigation -->
    <div class="to-top bg-whitelighter">
    	<div class="to-top-content">
    		<div class="tooltip">
    			<a href="@{{ $contact }}">
    				<span class="icon ion-social-whatsapp text-greensea text-xxxlarge"></span>
    			</a>
    			<span class="tooltip-text tooltip-top text-white" style="right:-1em;">Pesan CYRUS FACIAL SOAP Sekarang</span>
    		</div>
    	</div>
    </div>

</body>
<!-- Javascript -->
@yield('javascript')
</html>