<?php

/**
 *
 * Author : harrieanto31@yahoo.com | Web:http://bandd.web.id
 * -----------------------------------------------------------------
 * Created : 21/Sep/2019 12:08:27 AM
 * This view has been produced by RTE Template Engine
 * automaticly
 * As Repository PHP Framework Components
 * -----------------------------------------------------------------
 * Github : https://github.com/harrieanto
 *
 **/


require_once __DIR__.'/../../../vendor/autoload.php';

?>
<div class="container-fluid">
  <div class="alert bg-white">
    <div class="row">
    <div class="alert-close-button text-white"><span class="text-black text-xxlarge">&times;</div>
      <div class="col-6">
        <img src="/home/public/images/mastah-ad.png" class="img-responsive"/>
      </div>
      
<?php if(isset($ads)): ?>
<?php $adImage = $ads['image'] ?>
<?php $adCopywriting = $ads['description'] ?>
<div class="col-6 row bg-whitelighter text-whitelighter triangle-top round-medium right margin-top">
  <div class="col-6-sm margin-top margin-bottom">
<img src="<?php echo   $adImage  ?>" class="img-responsive round-medium"></img>
  </div>
  <div class="col-6-sm margin-top margin-bottom text-black text-small">
    <?php echo   $adCopywriting  ?>
  </div>
</div>
<?php endif; ?>

    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="padding-medium">
            <?php if (isset($post)): ?>
              
<?php if(!$post->isAvailable()): ?>
<div class="text-center"><h3 class="text-blacklighter">Sorry, Blog Content Not Yet Available</h3></div>
<?php endif; ?>

<?php $itemList = $post->getPageItems()->all() ?>

<?php foreach($itemList as $items): ?>
<div>
<a href="<?php echo   $route = route('blog')  ?>/<?php echo   $items['slug']  ?>" class="link"><h1 class="link"><?php echo   $items['heading']  ?></h1></a>
<div class="row">Posted by <a href="/<?php echo   $items['user']  ?>/profile" class="link text-red"><?php echo   $items['user']  ?></a> on <?php echo   $items['created_at']  ?></div>
<div class="margin-top"><?php echo   $items['highlight']  ?></div>
</div>

<?php foreach($tags[$items['id']] as $id => $tag): ?>
<a href="<?php echo   $route = route('blog.tag')  ?>/<?php echo   $tag['slug']  ?>" class="outlined-button text-blacklighter"> <?php echo   $tag['name']  ?> </a>
<?php endforeach; ?>
<?php endforeach; ?>

<?php if($post->getTotalPage() > 1): ?>
<div class="container margin-top">
  <?php if($previous = $post->getPreviousPosition() !== null): ?>
    <a href="<?php echo   $route = route('blog.page', $previous)  ?>" class="rounded-button text-redlighter"><?php echo   $post->getPreviousMarker()  ?></a>
  <?php endif; ?>
  
  <?php foreach($post->getNumberListMarker() as $number): ?>
    <a href="<?php echo   $route = route('blog.page', $number)  ?>" class="outlined-button text-blacklighter"><?php echo   $number  ?></a>
  <?php endforeach; ?>
  
  <?php if($next = $post->getNextPosition() !== null): ?>
    <a href="<?php echo   $route = route('blog.page', $next)  ?>" class="rounded-button text-redlighter"><?php echo   $post->getNextMarker()  ?></a>
  <?php endif; ?>
  </div>
  <?php endif; ?>

            <?php endif; ?>
            
            <?php if(isset($postListByTag) || isset($tagList)): ?>
              <?php $view('blog/tag') ?>
            <?php endif; ?>

      		<?php if(isset($readPost)): ?>
              <?php $view('blog/read') ?>
      		<?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>
