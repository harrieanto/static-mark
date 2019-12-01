<?php

/**
 *
 * Author : harrieanto31@yahoo.com | Web:http://bandd.web.id
 * -----------------------------------------------------------------
 * Created : 16/Oct/2019 01:54:57 PM
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
          	
<?php if(!$tag->isAvailable()): ?>
<div class="text-center"><h3 class="text-blacklighter"><?php echo   $contentNotFound  ?></h3></div>
<?php endif; ?>

<?php $itemList = $tag->getPageItems()->all() ?>

<?php foreach($itemList as $items): ?>
<div>
<a href="<?php echo   $route = route('blog.tag.read', $currentTag, $items['slug'])  ?>" class="link"><h1 class="link"><?php echo   $items['heading']  ?></h1></a>
<div class="row"><?php echo   $postedBy  ?> <a href="/<?php echo   $items['creator']['name']  ?>" class="link text-red"><?php echo   $items['creator']['name']  ?></a> on <?php echo   $items['created_at']  ?></div>
<div class="margin-top"><?php echo   $items['highlight']  ?></div>
</div>
<?php endforeach; ?>

<?php if($tag->getTotalPage() > 1): ?>
<div class="container margin-top">
  <?php if(($previous = $tag->getPreviousPosition()) !== null): ?>
    <a href="<?php echo   $route = route('blog.tag.page', $currentTag, $previous)  ?>" class="rounded-button text-redlighter"><?php echo   $tag->getPreviousMarker()  ?></a>
  <?php endif; ?>
  
  <?php foreach($tag->getNumberListMarker() as $number): ?>
    <a href="<?php echo   $route = route('blog.tag.page', $currentTag, $number)  ?>" class="outlined-button text-blacklighter"><?php echo   $number  ?></a>
  <?php endforeach; ?>
  
  <?php if(($next = $tag->getNextPosition()) !== null): ?>
    <a href="<?php echo   $route = route('blog.tag.page', $currentTag, $next)  ?>" class="rounded-button text-redlighter"><?php echo   $tag->getNextMarker()  ?></a>
  <?php endif; ?>
  </div>
  <?php endif; ?>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>