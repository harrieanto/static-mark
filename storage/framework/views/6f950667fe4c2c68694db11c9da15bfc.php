<?php

/**
 *
 * Author : harrieanto31@yahoo.com | Web:http://bandd.web.id
 * -----------------------------------------------------------------
 * Created : 28/Nov/2019 11:04:44 PM
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
        <!-- Content navigation -->
        <nav class="bg-white" style="position:relative;">
            <div class="menu-close-button margin-24 text-center hidden-lg" style="top:0;">
                <div class="menu-icon-line-1 menu-icon-line bg-red"></div>
                <div class="menu-icon-line-2 menu-icon-line bg-red"></div>
                <div class="menu-icon-line-3 menu-icon-line bg-red"></div>
            </div>
            
<?php $view('blog/nav') ?>

        </nav>
        <!-- Main content -->
        <div class="main-content col-100-percent bg-white">
            <header data-scroll='scroll-top' style="position:absolute;top:0;width:100%;">
                
<?php $view('blog/header') ?>

            </header>
            <div class="margin-top-100"></div>
            <?php if(!isset($home)): ?>
         	<div class="container-fluid">
         	  <div class="row">
         	      <div class="col-12">
         	          <div class="padding-medium text-right">
         	              <ul class="breadcrumb">
         	                  
<li><a href="/"><span class="icon ion-ios-home"></span></a></li>

<?php if(isset($currentPages)): ?>
<?php if(is_array($currentPages)): ?>
<?php foreach($currentPages as $link => $identifier): ?>
<?php if(is_string($link)): ?>
<li><a href="<?php echo   $link  ?>"><?php echo   $identifier  ?></a></li>
<?php endif; ?>

<?php if(!is_string($link)): ?>
<li><a href='javascript:;' class="disabled"><?php echo   $identifier  ?></a></li>
<?php endif; ?>
<?php endforeach; ?>
<?php endif; ?>

<?php if(!is_array($currentPages)): ?>
<li><a href='javascript:;' class="disabled"><?php echo   $currentPages  ?></a></li>
<?php endif; ?>
<?php endif; ?>

         	              </ul>
         	          </div>
         	      </div>
         	  </div>
        	</div>
        	<?php endif; ?>
        	
<?php if(isset($home)): ?>
<?php $view('blog/home') ?>
<?php endif; ?>

<?php if(isset($post)): ?>
<?php $view('blog/posts/list') ?>
<?php endif; ?>

<?php if(isset($readPost)): ?>
<?php $view('blog/posts/read') ?>
<?php endif; ?>

<?php if(isset($tag)): ?>
<?php $view('blog/posts/tag') ?>
<?php endif; ?>

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
    
<?php $view('blog/fixed-footer') ?>


     <!-- Scroll to top navigation -->
    <div class="to-top bg-whitelighter">
    	<div class="to-top-content">
    		<div class="tooltip">
    			<a href="#" id="toTop">
    				<span class="icon ion-ios-arrow-up text-xxlarge"></span>
    			</a>
    			<span class="tooltip-text tooltip-top text-white">back to top</span>
    		</div>
    	</div>
    </div>

</body>
<!-- Javascript -->

<?php $view('partials/js') ?>

</html>