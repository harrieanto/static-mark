<?php

/**
 *
 * Author : harrieanto31@yahoo.com | Web:http://bandd.web.id
 * -----------------------------------------------------------------
 * Created : 14/Nov/2019 09:50:01 PM
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
<div class="container margin-top-64">
  <ul class="pagination">
      <li>
          <ul>
            <?php if(($previous = $post->getPreviousPosition()) !== null): ?>
              <li class="bg-red"><a href="<?php echo   $route = route('blog.page', $previous)  ?>"><span class="text-white"><?php echo   $post->getPreviousMarker()  ?></span></a></li>
            <?php endif; ?>
            
            <?php foreach($post->getNumberListMarker() as $number): ?>
              <?php if(is_int($number)): ?>
                <li class="bg-semiclouds"><a href="<?php echo   $route = route('blog.page', $number)  ?>"><span class="text-red"><?php echo   $number  ?></span></a></li>
              <?php endif; ?>
    
              <?php if(is_string($number)): ?>
                <li class="bg-semiclouds disabled"><a href="<?php echo   $route = route('blog.page', $number)  ?>"><span class="text-red disabled"><?php echo   $number  ?></span></a></li>
              <?php endif; ?>
            <?php endforeach; ?>
            
            <?php if(($next = $post->getNextPosition()) !== null): ?>
              <li class="bg-red"><a href="<?php echo   $route = route('blog.page', $next)  ?>"><span class="text-white"><?php echo   $post->getNextMarker()  ?></span></a></li>
            <?php endif; ?>
          </ul>
      </li>
  </ul>
  </div>
  <?php endif; ?>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>