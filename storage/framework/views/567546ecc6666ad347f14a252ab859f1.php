<?php

/**
 *
 * Author : harrieanto31@yahoo.com | Web:http://bandd.web.id
 * -----------------------------------------------------------------
 * Created : 11/Oct/2019 09:50:53 PM
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
      
<?php $heading = $readPostByTag->get('heading') ?>
<?php $author = $readPostByTag->get('writer') ?>
<?php $createdAt = $readPostByTag->get('created_at') ?>
<?php $postImage = '' ?>

<div class="col-12 lazy-bg-highlight text-white margin-top">
<h1 class="text-white"><?php echo   $heading  ?></h1>
<div class="row margin-bottom text-white">
<?php echo   $postedBy  ?> <a href="/<?php echo   $author  ?>" class="link text-red"><?php echo   $author  ?></a> on <?php echo   $createdAt  ?>
</div>

<?php if($readPostByTag->has('advert') && !empty($readPostByTag->get('advert'))): ?>
<?php $advert = $readPostByTag->get('advert') ?>
<?php $adImage = $advert['image'] ?>
<?php $adCopywriting = $advert['description'] ?>

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

    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="container">
      <div class="col-12">
        <div class="padding-medium">
          
<?php echo   $readPostByTag->get('post')  ?>

          
<?php $tagList = $readPostByTag->get('tag') ?>

<?php foreach($tagList as $slug => $tag): ?>
<a href="<?php echo   $route = route('blog.tag', $slug)  ?>" class="outlined-button text-blacklighter"> <?php echo   $tag  ?> </a>
<?php endforeach; ?>

        </div>
      </div>
    </div>
  </div>
</div>