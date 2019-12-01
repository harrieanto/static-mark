<?php

/**
 *
 * Author : harrieanto31@yahoo.com | Web:http://bandd.web.id
 * -----------------------------------------------------------------
 * Created : 10/Nov/2019 02:44:47 PM
 * This view has been produced by RTE Template Engine
 * automaticly
 * As Repository PHP Framework Components
 * -----------------------------------------------------------------
 * Github : https://github.com/harrieanto
 *
 **/


require_once __DIR__.'/../../../vendor/autoload.php';

?>

 		<div class="container-fluid">
 			<div class="row">
 				<div class="menu-close-button margin-24 text-center">
     				<div class="menu-icon-line-1 menu-icon-line bg-red"></div>
                   	<div class="menu-icon-line-2 menu-icon-line bg-red"></div>
                    <div class="menu-icon-line-3 menu-icon-line bg-red"></div>
                </div>
                <div class="col-12 text-center margin-top">
            	   
    <?php $host = app_env('APP_HOST') ?>
    <a href="<?php echo   $host  ?>" class="link text-red header-link"><?php echo   $name = app_env('APP_NAME')  ?><?php echo   $appSubName  ?></a>

                </div>
            	<div class="col-12">
                	<div class="nav-icon-menu right text-center padding-small">
                    	<a href="javascript:;" class="site-search-open"><i class="icon text-xxlarge text-red ion-ios-search"></i></a>
                    	
    <?php $view('blog/finder') ?>

                	</div>
                	<!--
                	<div class="nav-icon-menu right text-center padding-small" style="width:auto;">
             		<ul class="dropdown">
				    	<a href="javascript:;" class="dropdown-button">
				    	    <span class="icon ion-ios-person text-xxlarge text-red"></span>
				    	</a>
				    	<li class="dropdown-collapse padding-medium bg-clouds">
				    	   <ul>
				    	   <?php if($isLogged): ?>
				    	       <li><a href="<?php echo   $logout = route('logout')  ?>" class="link"><i class="icon ion-ios-person margin-right"></i>Logout</a></li>
				    	   <?php endif; ?>
				    	   
				    	   <?php if(!$isLogged): ?>
				    	    <li><a href="<?php echo   $login = route('login')  ?>" class="link"><i class="icon ion-lock margin-right"></i>Login HEllo Hollo</a></li>
				    	   <?php endif; ?>				    	    
				    	   </uL>
				    	</li>
                	</ul>
                	</div>
                	-->
                </div>
            </div>
         </div>
