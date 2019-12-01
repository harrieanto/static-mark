<?php

/**
 *
 * Author : harrieanto31@yahoo.com | Web:http://bandd.web.id
 * -----------------------------------------------------------------
 * Created : 22/Aug/2019 10:28:54 PM
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

    <div class="col-12">
    	
<?php if(isset($createBlogPost)): ?>
<?php $view('editorjs/index') ?>
<?php endif; ?>

    	
<?php if(isset($updateBlogPost)): ?>
<?php $view('editorjs/index') ?>
<?php endif; ?>


    	<?php if(isset($blogPostManager) && $blogPostManager->isAvailable()): ?>
      <div class="col-12">
      	<center>
      		<table class="table">
      			<thead>
      				<th>#</th>
      					<th>Title</th>
      					<th>Slug</th>
      					<th colspan=2>Action</th>
      				</thead>
      			<tbody>
      				
<?php if(isset($blogPostManager) && $blogPostManager->isAvailable()): ?>
  <?php $edit = route('blog.post.manage.update') ?>
  <?php $delete = route('blog.post.manage.delete') ?>

  <?php $no = 1 ?>
  <?php $posts = $blogPostManager->getPageItems()->all() ?>

  <?php foreach($posts as $items): ?>
  <tr>
    <td><?php echo   $no  ?></td>
    <td><?php echo   $items['heading']  ?></td>
    <td><?php echo   $items['slug']  ?></td>
    <td>
    <a href="<?php echo   $edit  ?>/<?php echo   $items['slug']  ?>">
    <span class="icon ion-ios-compose-outline"></span>
    </a>
    </td>
    <td>
    <a href="<?php echo   $delete  ?>/<?php echo   $items['slug']  ?>">
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
      </div>
    	<?php endif; ?>
    	
<?php if(isset($blogPostManager) && !$blogPostManager->isAvailable()): ?>
<div class="text-center"><h3 class="text-blacklighter">No Content Can be Manage</h3></div>
<?php endif; ?>

    	
<?php $route = route('blog.post.manage') ?>

<?php if(isset($blogPostManager) && $blogPostManager->getTotalPage() > 1): ?>
<div class="container margin-top">
  <?php if($blogPostManager->getPreviousPosition() !== null): ?>
  <a href="<?php echo   $route  ?>/<?php echo   $blogPostManager->getPreviousPosition()  ?>" class="rounded-button text-redlighter"><?php echo   $blogPostManager->getPreviousMarker()  ?></a>
  <?php endif; ?>
  
  <?php foreach($blogPostManager->getNumberListMarker() as $number): ?>
  <a href="<?php echo   $route  ?>/<?php echo   $number  ?>" class="outlined-button text-blacklighter"><?php echo   $number  ?></a>
  <?php endforeach; ?>
  
  <?php if($blogPostManager->getNextPosition() !== null): ?>
  <a href="<?php echo   $route  ?>/<?php echo   $blogPostManager->getNextPosition()  ?>" class="rounded-button text-redlighter"><?php echo   $blogPostManager->getNextMarker()  ?></a>
  <?php endif; ?>
  </div>
  <?php endif; ?>

  	 </div>
  </div>
</div>