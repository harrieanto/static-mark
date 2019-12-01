<?php

/**
 *
 * Author : harrieanto31@yahoo.com | Web:http://bandd.web.id
 * -----------------------------------------------------------------
 * Created : 21/Oct/2019 04:22:20 PM
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
    <div class="col-12">
    
    	
<?php if(isset($flash)): ?>
<div class="col-12">
<center>
<span class="outlined-button disabled text-redlighter"><?php echo   $flash  ?></span>
</center>
</div>
  <?php endif; ?>

    	
    	<div class="col-12">
    		<h2>Do Upload</h2>
    	</div>
    	<?php echo   $view('dashboard/posts/add')  ?>
    	
    	<div class="col-12 margin-top-32">
    		<h2>Manage Posts</h2>
    	</div>
    	
    	<?php if(isset($post) && $post->isAvailable()): ?>
      <div class="col-12">
      	<center>
      		<table class="table">
      			<thead>
      				<th>#</th>
      					<th>Title</th>
      					<th>Slug</th>
      					<th colspan=1>Action</th>
      				</thead>
      			<tbody>
      				
<?php if(isset($post) && $post->isAvailable()): ?>

  <?php $no = 1 ?>
  <?php $posts = $post->getPageItems()->all() ?>

  <?php foreach($posts as $items): ?>
  <tr>
<td><?php echo   $no  ?></td>
<td><?php echo   $items['heading']  ?></td>
<td><?php echo   $items['slug']  ?></td>
<td>
<a href="<?php echo   $delete = route('dashboard.post.delete', $items['slug'])  ?>">
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
    	
    	<div class="col-12">
    		
<?php if(isset($post) && !$post->isAvailable()): ?>
<div class="text-center"><h3 class="text-blacklighter">No Content Can be Manage</h3></div>
<?php endif; ?>

    	</div>
    	
    	<div class="col-12">
    		
<?php $route = route('dashboard.post.page') ?>

<?php if(isset($post) && $post->getTotalPage() > 1): ?>
<div class="container margin-top">
  <?php if($post->getPreviousPosition() !== null): ?>
  <a href="<?php echo   $route = route('dashboard.post.page', $post->getPreviousPosition())  ?>" class="rounded-button text-redlighter"><?php echo   $post->getPreviousMarker()  ?></a>
  <?php endif; ?>
  
  <?php foreach($post->getNumberListMarker() as $number): ?>
  <a href="<?php echo   $route = route('dashboard.post.page', $number)  ?>" class="outlined-button text-blacklighter"><?php echo   $number  ?></a>
  <?php endforeach; ?>
  
  <?php if($post->getNextPosition() !== null): ?>
  <a href="<?php echo   $route = route('dashboard.post.page', $post->getNextPosition())  ?>" class="rounded-button text-redlighter"><?php echo   $post->getNextMarker()  ?></a>
  <?php endif; ?>
  </div>
  <?php endif; ?>

    	</div>
  	 </div>
  </div>
</div>