<?php

/**
 *
 * Author : harrieanto31@yahoo.com | Web:http://bandd.web.id
 * -----------------------------------------------------------------
 * Created : 09/Sep/2019 09:29:51 PM
 * This view has been produced by RTE Template Engine
 * automaticly
 * As Repository PHP Framework Components
 * -----------------------------------------------------------------
 * Github : https://github.com/harrieanto
 *
 **/


require_once __DIR__.'/../../../vendor/autoload.php';

?>
<div class="container-fluid bg-black text-center">
  <div class="row">
    <div class="col-12">
      
<?php if($readPost->has('posts')): ?>
<?php $readPosts = $readPost->get('posts') ?>
<?php $heading = $readPosts['heading'] ?>
<?php $author = $readPosts['author'] ?>
<?php $createdAt = $readPosts['created_at'] ?>
<?php $postImage = $readPosts['image'] ?>
<?php $postContent = $readPosts['content'] ?>

<div class="col-12 lazy-bg-highlight text-white margin-top">
<h1 class="text-white"><?php echo   $heading  ?></h1>
<div class="row margin-bottom text-white">
<?php echo   $postedBy  ?> <a href="/<?php echo   $author  ?>" class="link text-red"><?php echo   $author  ?></a> on <?php echo   $createdAt  ?>
</div>

<?php if($readPost->has('ads') && !empty($readPost->get('ads'))): ?>
<?php $ads = $readPost->get('ads') ?>
<?php $adImage = $ads['image'] ?>
<?php $adCopywriting = $ads['description'] ?>

<div class="col-6 row bg-whitelighter text-whitelighter triangle-top round-medium right margin-bottom" style="z-index:3;">
<div class="col-6-sm margin-top margin-bottom">
<img src="<?php echo   $adImage  ?>" class="img-responsive round-medium"></img>
</div>
<div class="col-6-sm margin-top margin-bottom text-black text-small">
<?php echo   $adCopywriting  ?>
</div>
</div>
<?php endif; ?>

</div>
<div class="overlay bg-blacklighter"></div>
<div data-image="<?php echo   $postImage  ?>"></div>
<?php endif; ?>

    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="container">
      <div class="col-12">
        <div class="padding-medium">
          
<?php echo   $postContent  ?>

          
<?php $tagList = $readPost->get('tags') ?>

<?php foreach($tagList['name'] as $index => $tagName): ?>
<a href="<?php echo   $route = route('blog.tag')  ?>/<?php echo   $tagList['slug'][$index]  ?>" class="outlined-button text-blacklighter"> <?php echo   $tagName  ?> </a>
<?php endforeach; ?>

        </div>
      </div>
    </div>
  </div>
</div>