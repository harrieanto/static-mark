<?php

/**
 *
 * Author : harrieanto31@yahoo.com | Web:http://bandd.web.id
 * -----------------------------------------------------------------
 * Created : 23/Aug/2019 11:33:43 AM
 * This view has been produced by RTE Template Engine
 * automaticly
 * As Repository PHP Framework Components
 * -----------------------------------------------------------------
 * Github : https://github.com/harrieanto
 *
 **/


require_once __DIR__.'/../../../vendor/autoload.php';

?>

<div class="nav">
<div class="nav-header text-center">
<span class="nav-header-text bg-white text-red text-center">bandd</span>
<div class="nav-header-line bg-red"></div>
 </div>
 
 <div class="nav-content">
   <div class="row center">
     <?php foreach($banddMenu as $menu): ?>
     <div class="nav-menu text-left">
       <?php $icon = 'ion-ios-arrow-right' ?>
       <?php if($menu->getIcon() !== null): ?>
         <?php $icon = $menu->getIcon() ?>
       <?php endif; ?>

       <a href="<?php echo   $menu->getSLug()  ?>" class="text-black">
         <i class="icon <?php echo   $icon  ?> margin-right"></i><span class="font-regular text-large link"><?php echo   $menu->getName()  ?><span>
       </a>
     </div>
     <?php endforeach; ?>
    </div>
  </div>
  
  <div class="container">
    <div class="menu-icon-line bg-red"></div>
  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="container h5">Crafted &amp; Delivered with <i class="icon ion-ios-heart text-red"></i> from Jember, East Java, Indonesia</div>
</div>
</div>
  </div>
</div>
