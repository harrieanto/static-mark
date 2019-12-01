<?php

/**
 *
 * Author : harrieanto31@yahoo.com | Web:http://bandd.web.id
 * -----------------------------------------------------------------
 * Created : 07/Sep/2019 09:10:06 PM
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
    
      <?php if(isset($flash)): ?>
      <div class="col-12">
        <center>
          <span class="outlined-button disabled text-redlighter"><?php echo   $flash  ?></span>
        </center>
      </div>
      <?php endif; ?>

    <?php $route = route('login') ?>
    <form method="post" action="<?php echo   $route  ?>" class="form-group">
        <input type="hidden" name="_token" value="<?php echo   $csrfToken  ?>"/>
    	<div class="col-12">
    		<button type="submit" class="button bg-redlighter right margin-right">Save</button>
    	</div>
    	<div class="col-6">
    		<div class="form padding-jumbo">
    			<input type="text" name="username" class="form-input text-large"/>
    			<div class="input-text-placeholder">
    				Username
    			</div>
    		</div>
    	</div>
    	<div class="col-6">
    		<div class="form padding-jumbo">
    			<input type="text" name="password" class="form-input text-large"/>
    			<div class="input-text-placeholder">
    				Password
    			</div>
    		</div>
    	</div>
    </form>
  </div>
</div>