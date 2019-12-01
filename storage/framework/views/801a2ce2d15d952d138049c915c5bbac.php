<?php

/**
 *
 * Author : harrieanto31@yahoo.com | Web:http://bandd.web.id
 * -----------------------------------------------------------------
 * Created : 21/Oct/2019 04:22:20 PM
 * This view has been produced by RTE Template Engine
 * automaticly
 * As Repository PHP Framework Components
 * -----------------------------------------------------------------
 * Github : https://github.com/harrieanto
 *
 **/


require_once __DIR__.'/../../../vendor/autoload.php';

?>
<?php $target = route('dashboard.upload.post') ?>

<div class="col-6">
	<div class="label">Upload Markdown Post</div>
	<form enctype="multipart/form-data" method="post" action="<?php echo   $target  ?>" class="form-group">
		<input type="hidden" name="_token" value="<?php echo   $csrfToken  ?>"/>
		<div class="col-12">
	 		<button type="submit" class="button bg-redlighter right margin-right text-white">Upload Post</button>
	  	</div>
	  	<div class="col-12">
	  		<div class="form">
	  			<input type="file" name="attachment" class="form-input text-large text-red"/>
	  		</div>
	  	</div>
	 </form>
</div>

<?php $target = route('dashboard.upload.image') ?>

<div class="col-6">
	<div class="label">Upload Image</div>
	<form enctype="multipart/form-data" method="post" action="<?php echo   $target  ?>" class="form-group">
		<input type="hidden" name="_token" value="<?php echo   $csrfToken  ?>"/>
		<div class="col-12">
			<button type="submit" class="button bg-redlighter right margin-right text-white">Upload Image</button>
		</div>
		<div class="col-12">
			<div class="form">
				<input type="file" name="attachment" class="form-input text-large text-red"/>
			</div>
		</div>
	</form>
</div>