<?php

/**
 *
 * Author : harrieanto31@yahoo.com | Web:http://bandd.web.id
 * -----------------------------------------------------------------
 * Created : 08/Sep/2019 09:29:39 PM
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
		<div class="container">
			<div class="col-12">
				<div class="padding-medium">
					
    <?php if(isset($postListByTag)): ?>
      <?php $slug = $postListByTag['slug'] ?>
      <?php $heading = $postListByTag['heading'] ?>
      <?php $createdAt = $postListByTag['created_at'] ?>
      <?php $author = $postListByTag['author'] ?>

      <?php foreach($postListByTag['highlight'] as $index => $highlight): ?>
        <div>
          <a href="<?php echo   $route = route('blog')  ?><?php echo   $slug[$index]  ?>"><h1 class="link"><?php echo   $heading[$index]  ?></h1></a>
          <div class="row"><?php echo   $postedBy  ?> <a href="/<?php echo   $author[$index]  ?>/profile" class="link text-red"><?php echo   $author[$index]  ?></a> on <?php echo   $createdAt[$index]  ?></div>
          <div class="margin-top"><?php echo   $highlight  ?></div>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>

				</div>
			</div>
		</div>
		</div>
</div>
