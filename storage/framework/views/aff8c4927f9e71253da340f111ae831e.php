<?php

/**
 *
 * Author : harrieanto31@yahoo.com | Web:http://bandd.web.id
 * -----------------------------------------------------------------
 * Created : 08/Sep/2019 11:33:29 PM
 * This view has been produced by RTE Template Engine
 * automaticly
 * As Repository PHP Framework Components
 * -----------------------------------------------------------------
 * Github : https://github.com/harrieanto
 *
 **/


require_once __DIR__.'/../../../vendor/autoload.php';

?>
	<div class="header scroll-up row bg-white">
 		<div class="col-12">
 			<div class="row">
 				<div class="menu-close-button margin-24 text-center">
     				<div class="menu-icon-line-1 menu-icon-line bg-red"></div>
                   	<div class="menu-icon-line-2 menu-icon-line bg-red"></div>
                    <div class="menu-icon-line-3 menu-icon-line bg-red"></div>
                </div>
                <div class="nav-header margin-8 text-center">
            	   
    <?php $host = app_env('APP_HOST') ?>
    <a href="<?php echo   $host  ?>" class="link text-red text-small">bandd</a>

                </div>
            	<div class="col-12">
                	<div class="nav-icon-menu right text-center padding-small">
                    	<a href="javascript:;" class="site-search-open"><i class="icon text-xxlarge text-red ion-ios-search"></i></a>
                    	
    <?php $view('bandd/finder') ?>

                	</div>
                </div>
            </div>
         </div>
     </div>