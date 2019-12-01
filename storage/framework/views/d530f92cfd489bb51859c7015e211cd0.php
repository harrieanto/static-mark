<?php

/**
 *
 * Author : harrieanto31@yahoo.com | Web:http://bandd.web.id
 * -----------------------------------------------------------------
 * Created : 26/Nov/2019 04:49:37 PM
 * This view has been produced by RTE Template Engine
 * automaticly
 * As Repository PHP Framework Components
 * -----------------------------------------------------------------
 * Github : https://github.com/harrieanto
 *
 **/


require_once __DIR__.'/../../../vendor/autoload.php';

?>

    <div class="blank-space"></div>
        <footer class="container-fixed footer-fixed">
            <div class="container-fluid">
                <div class="container-fluid margin-top-64">
                    <?php if(isset($post) || isset($advert)): ?>
                        
<?php if(isset($readPost) && $readPost->has('advert') && !empty($readPost->get('advert'))): ?>
<?php $advert = $readPost->get('advert') ?>
<?php $adCta = $advert['cta'] ?>
<?php $adTitle = $advert['title'] ?>
<?php $adImage = $advert['image'] ?>
<?php $adContact = $advert['contact'] ?>
<?php $adCopywriting = $advert['description'] ?>
<?php endif; ?>

<?php if(!isset($readPost) && isset($advert)): ?>
<?php $advert = $advert['advert'] ?>
<?php $adCta = $advert['cta'] ?>
<?php $adTitle = $advert['title'] ?>
<?php $adImage = $advert['image'] ?>
<?php $adContact = $advert['contact'] ?>
<?php $adCopywriting = $advert['description'] ?>
<?php endif; ?>

<div class="row">
<div class="col-12 text-center">
<span class="text-black text-xxxlarge font-heavy"><?php echo   $adTitle  ?></span>
</div>
<div class="col-6-sm margin-top-24">
<img src="<?php echo   $adImage  ?>" class="img-responsive right round-medium" width=250 height=350/>
</div>
<div class="col-6-sm margin-top">
<p class="text-black text-medium text-left">
<?php echo   $adCopywriting  ?>
<p class="text-red text-medium link"><?php echo   $adCta  ?></p>
</p>
<a href="<?php echo   $adContact  ?>" class="link-overlay"></a>
</div>
  </div>

                    <?php endif; ?>
                    <div class="container-fluid bottom-left" style="bottom: 24px;">
                        <div class="row">
                            <div class="col-4 link text-center">
                                <a href="<?php echo   $creator = route('harrieanto')  ?>" class="text-black">Meet Creator</a>
                            </div>
                            <div class="col-4 link text-center">
                                <span class="text-black"><?php echo   $copy = app_env('APP_COPYRIGHT')  ?></span>
                            </div>
                    <div class="col-2 link text-center">
                    <a href="<?php echo   $waNumber  ?>" class="text-black">+<?php echo   $wa = app_env('APP_CONTACT')  ?></a>
                    </div>
                      </div>
                    </div>
                </div>
            </div>
        </footer>
