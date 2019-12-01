<?php

/**
 *
 * Author : harrieanto31@yahoo.com | Web:http://bandd.web.id
 * -----------------------------------------------------------------
 * Created : 29/Nov/2019 10:04:26 AM
 * This view has been produced by RTE Template Engine
 * automaticly
 * As Repository PHP Framework Components
 * -----------------------------------------------------------------
 * Github : https://github.com/harrieanto
 *
 **/


require_once __DIR__.'/../../../vendor/autoload.php';

?>
<!DOCTYPE html>
<html lang="<?php echo   $lang = app_env('APP_LANG')  ?>">
<head>
     <!-- Html meta name -->
	

  <meta charset="utf-8">
  <meta name="csrf-token" content="<?php echo   $csrfToken  ?>">
  <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
  <meta content="width=device-width,initial-scale=1.0" name="viewport">
  <?php echo   $meta  ?>


	<!-- The site icon -->
	
  <link rel="icon" href="/public/images/cyrus/cyrus_logo.png" type="image/png">
  <link rel="apple-touch-icon" href="/public/images/cyrus/cyrus_logo.png">
  <link rel="apple-touch-icon" sizes="76x76" href="/public/images/cyrus/cyrus_logo.png">
  <link rel="apple-touch-icon" sizes="120x120" href="/public/images/cyrus/cyrus_logo.png">
  <link rel="apple-touch-icon" sizes="152x152" href="/public/images/cyrus/cyrus_logo.png">

     <!-- Stylesheet -->
    

  <link rel="stylesheet" type="text/css" href="/public/css/bandd.min.css"/>


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
                
<?php echo   $view('cyrus/header')  ?>

            </header>
        	
<?php echo   $view('cyrus/content')  ?>

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
    
    <?php echo   $view('cyrus/fixed-footer')  ?>


     <!-- Scroll to top navigation -->
    <div class="to-top bg-whitelighter">
    	<div class="to-top-content">
    		<div class="tooltip">
    			<a href="<?php echo   $contact  ?>">
    				<span class="icon ion-social-whatsapp text-greensea text-xxxlarge"></span>
    			</a>
    			<span class="tooltip-text tooltip-top text-white" style="right:-1em;">Pesan CYRUS FACIAL SOAP Sekarang</span>
    		</div>
    	</div>
    </div>

</body>
<!-- Javascript -->

<script src="/public/js/cyrus.min.js"></script>

</html>