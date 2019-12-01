<?php

/**
 *
 * Author : harrieanto31@yahoo.com | Web:http://bandd.web.id
 * -----------------------------------------------------------------
 * Created : 28/Nov/2019 10:56:14 PM
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

<div class="container-fluid text-white margin-top">
  <div data-image="<?php echo   $postImage  ?>"></div>
  <div class="overlay bg-blacklighter"></div>
  <div class="row margin-bottom text-white">
    <h1 class="text-white"><?php echo   $heading  ?></h1>
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

    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="container">
      <div class="col-12">
        <div class="padding-medium">
          
<?php echo   $readPost->get('post')  ?>
<?php $hashtag = implode(', ', $readPost->get('tag')) ?>

<div class="sharer margin-top-32 margin-bottom-32">
  <div class="sharer-panel">
    <button class="button bg-belizehole text-white" data-sharer="facebook" data-hashtag="<?php echo   $h = explode(', ', $hashtag)[0]  ?>" data-url="<?php echo   $readPost->get('url')  ?>"><i class="ion-social-facebook text-white margin-right"></i>Share on Facebook</button>
    <button class="button bg-blue text-white" data-sharer="twitter" data-hashtag="<?php echo   $hashtag  ?>" data-title="<?php echo   $title  ?>" data-via="@<?php echo   $readPost->get('creator')['name']  ?>" data-url="<?php echo   $readPost->get('url')  ?>"><i class="ion-social-twitter text-white margin-right"></i>Share on Twitter</button>
    <button class="button bg-belizehole text-white" data-sharer="linkedin" data-url="<?php echo   $readPost->get('url')  ?>"><i class="ion-social-linkedin text-white margin-right"></i>Share on Linkedin</button>
    <button class="button bg-greensea text-white" data-sharer="whatsapp" data-title="<?php echo   $title  ?>" data-url="<?php echo   $readPost->get('url')  ?>"><i class="ion-social-whatsapp text-white margin-right"></i>Share on Whatsapp</button>
    <button class="button bg-greensea text-white" data-sharer="evernote" data-title="<?php echo   $title  ?>" data-url="<?php echo   $readPost->get('url')  ?>">Share on Evernote</button>
  </div>
</div>

<div class="margin-top-32 margin-bottom-32">
 <div id="disqus_thread"></div>
</div>

          
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