<?php

/**
 *
 * Author : harrieanto31@yahoo.com | Web:http://bandd.web.id
 * -----------------------------------------------------------------
 * Created : 19/Oct/2019 04:03:13 PM
 * This view has been produced by RTE Template Engine
 * automaticly
 * As Repository PHP Framework Components
 * -----------------------------------------------------------------
 * Github : https://github.com/harrieanto
 *
 **/


require_once __DIR__.'/../../../vendor/autoload.php';

?>

<?php if($readPost->has('advert') && !empty($readPost->get('advert'))): ?>
<?php $advert = $readPost->get('advert') ?>
<?php $adCta = $advert['cta'] ?>
<?php $adContact = $advert['contact'] ?>
<?php $adImage = $advert['image'] ?>
<?php $adCopywriting = $advert['description'] ?>
<?php endif; ?>


<div class="container-fluid bg-black text-center">
  <div class="row">
    <div class="col-12">
      
<?php $heading = $readPost->get('heading') ?>
<?php $author = $readPost->get('creator')['name'] ?>
<?php $createdAt = $readPost->get('created_at') ?>
<?php $postImage = $readPost->get('highlight_image') ?>

<div class="col-12 lazy-bg-highlight text-white margin-top">
<h1 class="text-white"><?php echo   $heading  ?></h1>
<div class="row margin-bottom text-white">
<?php echo   $postedBy  ?> <a href="/<?php echo   $author  ?>" class="link text-red"><?php echo   $author  ?></a> on <?php echo   $createdAt  ?>
</div>
<div class="container">

<?php if($readPost->has('advert') && !empty($readPost->get('advert'))): ?>
<div class="col-12 round-medium">
<div class="container row round-medium margin-bottom">
<div class="container row text-whitelighter triangle-top bg-whitelighter round-medium">
<div class="col-6-sm margin-top margin-bottom">
<img src="<?php echo   $adImage  ?>" class="img-responsive round-medium" width=200 height=200/>
</div>
<div class="col-6-sm">
<p class="text-black text-medium text-left">
<?php echo   $adCopywriting  ?>
<p class="text-left"><a href="<?php echo   $adContact  ?>" class="text-red text-medium link"><?php echo   $adCta  ?></a></p>
</p>
</div>
</div>
</div>
</div>
<?php endif; ?>

</div>
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
          
<?php echo   $readPost->get('post')  ?>

          
<?php if($readPost->has('advert') && !empty($readPost->get('advert'))): ?>
<div class="alert row bg-semiclouds round-medium">
<div class="alert-close-button text-white">
<span class="text-black text-xxlarge">&times;</span>
</div>
<div class="col-12 round-medium right margin-bottom">
<div class="col-6-sm margin-top margin-bottom">
<img src="<?php echo   $adImage  ?>" class="img-responsive round-medium" width=200 height=200/>
</div>
<div class="col-6-sm">
<p class="text-black text-medium"><?php echo   $adCopywriting  ?></p>
<a href="<?php echo   $adContact  ?>" class="text-red text-medium text-center link"><?php echo   $adCta  ?></a>
</div>
</div>
</div>
<?php endif; ?>

          
<?php $tagList = $readPost->get('tag') ?>

<?php foreach($tagList as $slug => $tag): ?>
<a href="<?php echo   $route = route('blog.tag', $slug)  ?>" class="outlined-button text-blacklighter"> <?php echo   $tag  ?> </a>
<?php endforeach; ?>

          
<?php $creators = $readPost->get('creator') ?>
<div class="row bg-semiclouds margin-top margin-bottom round-medium triangle-top text-semiclouds">
<div class="col-5-sm">
<img src="<?php echo   $creators['picture']  ?>" class="img-responsive round-large margin-top margin-bottom" width=250 height=250/>
</div>
<div class="col-7-sm">
<div class="margin-top margin-bottom">
<a href="<?php echo   $creators['site']  ?>" class="link text-red">
<?php echo   $creators['name']  ?>
</a>
</div>
<p class="text-medium"><?php echo   $creators['about']  ?></p>
</div>
</div>

        </div>
      </div>
    </div>
  </div>
</div>