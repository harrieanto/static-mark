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

<div class="nav">
<div class="nav-header text-center">
<span class="nav-header-text bg-white text-red text-center">
<?php echo   $name = app_env('APP_NAME')  ?>
</span>
<div class="nav-header-line bg-red"></div>
 </div>

 <div class="nav-content">
   <div class="row center">
     <?php foreach($defaultMenus as $name => $menu): ?>
     <div class="nav-menu text-left">
       <?php $icon = 'ion-ios-arrow-right' ?>
       
       <?php if(isset($menu['icon'])): ?>
         <?php $icon = $menu['icon'] ?>
       <?php endif; ?>

       <?php $slug = '' ?>
       
       <?php if(isset($menu['slug'])): ?>
         <?php $slug = $menu['slug'] ?>
       <?php endif; ?>
       
       <a href="<?php echo   $slug  ?>" class="text-black">
         <i class="icon margin-right <?php echo   $icon  ?>"></i><span class="font-regular text-large link"><?php echo   $name  ?><span>
       </a>
     </div>
     <?php endforeach; ?>
     
     <?php if($isLogged): ?>
       <?php foreach($adminMenus as $name => $menu): ?>
       <div class="nav-menu text-left">
         <?php $icon = 'ion-ios-arrow-right' ?>
       
         <?php if(isset($menu['icon'])): ?>
           <?php $icon = $menu['icon'] ?>
         <?php endif; ?>

         <?php $slug = '' ?>
       
         <?php if(isset($menu['slug'])): ?>
           <?php $slug = $menu['slug'] ?>
         <?php endif; ?>
       
         <a href="<?php echo   $slug  ?>" class="text-black">
           <i class="icon <?php echo   $icon  ?>  margin-right"></i><span class="font-regular text-large link"><?php echo   $name  ?><span>
         </a>
       </div>
       <?php endforeach; ?>
     <?php endif; ?>
    </div>
  </div>
 
 <div class="nav-content">
   <div class="row center">
    </div>
  </div>
  
  <div class="container">
    <div class="menu-icon-line bg-red"></div>
  </div>
