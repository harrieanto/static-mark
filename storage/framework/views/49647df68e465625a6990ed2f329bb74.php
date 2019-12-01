<?php

/**
 *
 * Author : harrieanto31@yahoo.com | Web:http://bandd.web.id
 * -----------------------------------------------------------------
 * Created : 27/Nov/2019 04:00:46 PM
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
	
  <link rel="icon" href="/public/images/portfolio/hy.png" type="image/png">
  <link rel="apple-touch-icon" href="/public/images/portfolio/hy.png">
  <link rel="apple-touch-icon" sizes="76x76" href="/public/images/portfolio/hy.png">
  <link rel="apple-touch-icon" sizes="120x120" href="/public/images/portfolio/hy.png">
  <link rel="apple-touch-icon" sizes="152x152" href="/public/images/portfolio/hy.png">

     <!-- Stylesheet -->
    

  <link rel="stylesheet" type="text/css" href="/public/css/simple-grid.css"/>
  <link rel="stylesheet" type="text/css" href="/public/css/simple-bg.css"/>
  <link rel="stylesheet" type="text/css" href="/public/css/simple-color.css"/>
  <link rel="stylesheet" type="text/css" href="/public/css/layout.css"/>
  <link rel="stylesheet" type="text/css" href="/public/css/table.css"/>
  <link rel="stylesheet" type="text/css" href="/public/css/modal.css"/>
<link rel="stylesheet" type="text/css" href="/public/css/dropdown.css"/>
  <link rel="stylesheet" type="text/css" href="/public/css/notify.css"/>
  <link rel="stylesheet" type="text/css" href="/public/css/animation.css"/>
  <link rel="stylesheet" type="text/css" href="/public/vendor/highlight/styles/github-gist.css"/>
  <link rel="stylesheet" type="text/css" href="/public/vendor/ionicon/css/ionicons.css"/>


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
            
<?php echo   $view('blog/nav')  ?>

        </nav>
        <!-- Main content -->
        <div class="main-content col-100-percent bg-white">
            <div class="col-100-percent">
        	    
<?php echo   $view('portfolio/content')  ?>

        	</div>
        </div>
    </main>
</body>
<!-- Javascript -->

<?php $view('partials/js') ?>

</html>