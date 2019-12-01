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
<div class="menu-close-button margin-24 text-center" style="top:0;">
    <div class="menu-icon-line-1 menu-icon-line bg-red"></div>
    <div class="menu-icon-line-2 menu-icon-line bg-red"></div>
    <div class="menu-icon-line-3 menu-icon-line bg-red"></div>
</div>

<div class="container-fluid">
	<div class="row">
		<div class="col-12 margin-top text-center">
			
    <?php $host = app_env('APP_HOST') ?>
    <a href="<?php echo   $host  ?>" class="link text-red header-link"><?php echo   $name = app_env('APP_NAME')  ?><?php echo   $appSubName  ?></a>

		</div>
		<div class="col-12">
			<ul class="navigation">
				<li>
					<ul class="dropdown">
					   <a href="javascript:;" class="dropdown-button text-red ion-ios-person-outline text-xxlarge"></a>
						<li class="dropdown-collapse bg-semiclouds text-semiclouds">
							<ul>
								<?php if($isLogged): ?>
								<li><a href="<?php echo   $logout = route('logout')  ?>" class="link"><i class="icon ion-ios-person margin-right"></i>Logout</a></li>
								<?php endif; ?>
								
								<?php if(!$isLogged): ?>
								<li><a href="<?php echo   $login = route('login')  ?>" class="link"><i class="icon ion-ios-person margin-right"></i>Login</a></li>
								<?php endif; ?>
							</ul>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;" class="site-search-open"><i class="icon text-xxlarge text-red ion-ios-search"></i></a>
					
    <?php $view('blog/finder') ?>

				</li>
			</ul>
		</div>
	</div>
</div>
