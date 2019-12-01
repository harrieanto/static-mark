<?php

/**
 *
 * Author : harrieanto31@yahoo.com | Web:http://bandd.web.id
 * -----------------------------------------------------------------
 * Created : 16/Oct/2019 05:59:19 AM
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
      <div class="row">
        <div class="col-12">
          <div class="padding-medium">
          	
<?php if(!$post->isAvailable()): ?>
<div class="text-center"><h3 class="text-blacklighter">Sorry, Blog Content Not Yet Available</h3></div>
<?php endif; ?>

<?php $itemList = $post->getPageItems()->all() ?>

<?php foreach($itemList as $items): ?>
<div>
<a href="<?php echo   $route = route('blog')  ?>/<?php echo   $items['slug']  ?>" class="link"><h1 class="link"><?php echo   $items['heading']  ?></h1></a>
<div class="row"><?php echo   $postedBy  ?> <a href="/<?php echo   $items['creator']['name']  ?>" class="link text-red"><?php echo   $items['creator']['name']  ?></a> on <?php echo   $items['created_at']  ?></div>
<div class="margin-top"><?php echo   $items['highlight']  ?></div>
</div>

<?php foreach($items['tag'] as $slug => $tag): ?>
<a href="<?php echo   $route = route('blog.tag', $slug)  ?>" class="outlined-button text-blacklighter"> <?php echo   $tag  ?> </a>
<?php endforeach; ?>
<?php endforeach; ?>

<?php if($post->getTotalPage() > 1): ?>
<div class="container margin-top">
  <?php if(($previous = $post->getPreviousPosition()) !== null): ?>
    <a href="<?php echo   $route = route('blog.page', $previous)  ?>" class="rounded-button text-redlighter"><?php echo   $post->getPreviousMarker()  ?></a>
  <?php endif; ?>
  
  <?php foreach($post->getNumberListMarker() as $number): ?>
    <a href="<?php echo   $route = route('blog.page', $number)  ?>" class="outlined-button text-blacklighter"><?php echo   $number  ?></a>
  <?php endforeach; ?>
  
  <?php if(($next = $post->getNextPosition()) !== null): ?>
    <a href="<?php echo   $route = route('blog.page', $next)  ?>" class="rounded-button text-redlighter"><?php echo   $post->getNextMarker()  ?></a>
  <?php endif; ?>
  </div>
  <?php endif; ?>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>