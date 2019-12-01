<?php

/**
 *
 * Author : harrieanto31@yahoo.com | Web:http://bandd.web.id
 * -----------------------------------------------------------------
 * Created : 03/Sep/2019 04:35:37 PM
 * This view has been produced by RTE Template Engine
 * automaticly
 * As Repository PHP Framework Components
 * -----------------------------------------------------------------
 * Github : https://github.com/harrieanto
 *
 **/


require_once __DIR__.'/../../../vendor/autoload.php';

?>
<?php $form_id = 'editorjs-form' ?>

<?php if(isset($createAdPost)): ?>
  <?php $form_id = 'editorjs-ads-form' ?>
<?php endif; ?>

<?php if(isset($createBlogPost)): ?>
  <?php $form_id = 'editorjs-blog-post-form' ?>
<?php endif; ?>

<?php if(isset($updateBlogPost)): ?>
	<div class="hidden" id="previous-data">
		<?php echo   $updateBlogPost['previous_data']  ?>
	</div>

  <?php $form_id = 'editorjs-blog-post-update-form' ?>
<?php endif; ?>

<form class="form-group" id="<?php echo   $form_id  ?>">
  <div class="text-right margin-top-32">
    <a href="javascript:;" class="outlined-button bg-redlighter text-white js-modal-button"><span class="text-white text-medium">Save</span></a>
    <?php $view('editorjs/modal') ?>
  </div>
  <div class="margin-top-64">
    <div id="editorjs"></div>
  </div>
</form>