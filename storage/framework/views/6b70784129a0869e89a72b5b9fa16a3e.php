<?php

/**
 *
 * Author : harrieanto31@yahoo.com | Web:http://bandd.web.id
 * -----------------------------------------------------------------
 * Created : 03/Sep/2019 04:35:38 PM
 * This view has been produced by RTE Template Engine
 * automaticly
 * As Repository PHP Framework Components
 * -----------------------------------------------------------------
 * Github : https://github.com/harrieanto
 *
 **/


require_once __DIR__.'/../../../vendor/autoload.php';

?>

    <?php if(isset($updateBlogPost)): ?>
    <?php $form_save_id = 'blog-post-update' ?>
    <?php endif; ?>

    <?php if(isset($createBlogPost)): ?>
    <?php $form_save_id = 'blog-post-save' ?>
    <?php endif; ?>


<div class="modal" id="myModal">
	<div class="modal-body">
		<div class="modal-close-button bg-clouds padding-large margin-2">
			<span class="text-xxlarge text-black">&times;</span>
		</div>
		<div class="modal-header padding-xxlarge text-black text-left">
			
<?php if(isset($createBlogPost)): ?>
Please add your relevant tag before published
<?php endif; ?>

<?php if(isset($createAdPost)): ?>
Please add your relevant tag ads before published
<?php endif; ?>

		</div>
		<div class="modal-content bg-white">
			<div class="container-fluid">
				<div class="row">
					<div class="form-group">
						
<?php if(isset($createBlogPost) || isset($updateBlogPost)): ?>
    <div class="col-6">
    <div class="form padding-jumbo">
    <input type="text" class="form-input blog-post-tag-name text-large"/>
    <div class="placeholder-text">
    Add your tag here
    </div>
    </div>
    <a href="javascript:;" class="button bg-redlighter padding-large" id="blog-post-add-tag">Add</a>
    </div>
    <div class="col-6">
    <div class="form padding-jumbo">
    <select class="blog-post-tag-list" multiple="multiple">
      <?php if(isset($updateBlogPost)): ?>
          <?php foreach($updateBlogPost['tags'] as $tags): ?>
          <option value="<?php echo   $tags['id']  ?>" selected><?php echo   $tags['tag']  ?></option>
          <?php endforeach; ?>
      <?php endif; ?>
    </select>
    </div>
    </div>
    <div class="col-12">
    <a href="javascript:;" id="<?php echo   $form_save_id  ?>" class="button bg-redlighter padding-large margin-top">
    <span class="text-white">Save Post</span>
    </a>
    </div>
 <?php endif; ?>

						
<?php if(isset($createAdPost)): ?>
<div class="col-6">
<select id="ad-post-tag" class="button-block padding-large">
  <option value="">Select your relevant tag</option>
<?php foreach($createAdPost['tags'] as $tag): ?>
<option value="<?php echo   $tag->getId()  ?>"><?php echo   $tag->getName()  ?></option>
<?php endforeach; ?>
</select>
</div>
<div class="col-6 text-right">
<a href="javascript:;" class="button bg-redlighter padding-large" id="ad-post-save"><span class="text-white">Save Ad</span></a>
</div>
<?php endif; ?>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>