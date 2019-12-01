<!DOCTYPE html>
<html lang="en">
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

    <!-- Content conatiner -->
     <main>
        <!-- Content navigation -->
        <nav class="bg-white" style="position:relative;">
            <div class="menu-close-button margin-24 text-center hidden-lg" style="top:0;">
                <div class="menu-icon-line-1 menu-icon-line bg-red"></div>
                <div class="menu-icon-line-2 menu-icon-line bg-red"></div>
                <div class="menu-icon-line-3 menu-icon-line bg-red"></div>
            </div>
            @yield('content-nav')
        </nav>
        
        <!-- Main content -->
        <div class="main-content col-100-percent bg-white">
            <header data-scroll='scroll-top' style="position:absolute;top:0;width:100%;">
                @yield('header')
            </header>
            <div class="margin-top-100"></div>
        	@yield('content')
        </div>
    </main>
    
    @yield('footer')
    
</body>
<!-- Javascript -->
@yield('javascript')
</html>