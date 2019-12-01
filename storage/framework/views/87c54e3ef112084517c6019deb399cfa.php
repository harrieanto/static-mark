<?php

/**
 *
 * Author : harrieanto31@yahoo.com | Web:http://bandd.web.id
 * -----------------------------------------------------------------
 * Created : 23/Aug/2019 10:42:02 AM
 * This view has been produced by RTE Template Engine
 * automaticly
 * As Repository PHP Framework Components
 * -----------------------------------------------------------------
 * Github : https://github.com/harrieanto
 *
 **/


require_once __DIR__.'/../../../vendor/autoload.php';

?>
<div class="container">
  <div class="row">
    
      <?php if(isset($flash)): ?>
      <div class="col-12">
        <center>
          <span class="outlined-button disabled text-redlighter"><?php echo   $flash  ?></span>
        </center>
      </div>
      <?php endif; ?>

    <div class="col-12 padding-medium">
      <div class="col-12">
        
<?php if(isset($menuManager) && !$menuManager->isAvailable()): ?>
<div class="text-center"><h3 class="text-blacklighter">No Content Can be Manage</h3></div>
<?php endif; ?>

        <?php if(isset($menuManager) && $menuManager->isAvailable()): ?>
        <center>
          <table class="table">
            <thead>
              <th>#</th>
              <th>Menu</th>
              <th>Slug</th>
              <th>Icon</th>
              <th colspan=2>Action</th>
            </thead>
            <tbody>
              
<?php if(isset($menuManager) && $menuManager->isAvailable()): ?>
<?php $edit = route('menu.manage.update') ?>
<?php $delete = route('menu.manage.delete') ?>

<?php $no = 1 ?>
<?php $menus = $menuManager->getPageItems()->all() ?>

<?php foreach($menus as $items): ?>
<tr>
  <td><?php echo   $no  ?></td>
  <td><?php echo   $items['name']  ?></td>
  <td><?php echo   $items['slug']  ?></td>
  <td><?php echo   $items['icon']  ?></td>
  <td>
    <a href="<?php echo   $edit  ?>/<?php echo   $items['id']  ?>">
      <span class="icon ion-ios-compose-outline"></span>
    </a>
  </td>
  <td>
    <a href="<?php echo   $delete  ?>/<?php echo   $items['id']  ?>">
    <span class="icon ion-ios-trash-outline"></span>
    </a>
      </td>
  </tr>
  <?php $no++ ?>
  <?php endforeach; ?>
  <?php endif; ?>

            </tbody>
          </table>
        </center>
        <?php endif; ?>
  	   </div>
  	 </div>
  </div>
</div>