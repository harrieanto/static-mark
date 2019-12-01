<?php

/**
 *
 * Author : harrieanto31@yahoo.com | Web:http://bandd.web.id
 * -----------------------------------------------------------------
 * Created : 28/Nov/2019 11:01:31 PM
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
<html lang="en">
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
        	
<?php if(isset($post)): ?>
<?php $view('dashboard/posts/list') ?>
<?php endif; ?>

<?php if(isset($login)): ?>
<?php $view('dashboard/login') ?>
<?php endif; ?>

        </div>
    </main>
    
    
<?php $view('dashboard/footer') ?>

    
</body>
<!-- Javascript -->

<?php $view('partials/js') ?>

</html>