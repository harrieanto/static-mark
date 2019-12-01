<?php

/**
 *
 * Author : harrieanto31@yahoo.com | Web:http://bandd.web.id
 * -----------------------------------------------------------------
 * Created : 22/Aug/2019 10:30:52 PM
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
    <form class="form-group" name="form">
    	<div class="col-12">
    		
<?php if(isset($updateMenu)): ?>
<?php $id = 'update-menu' ?>
<?php endif; ?>

<?php if(isset($addMenu)): ?>
<?php $id = 'add-menu' ?>
<?php endif; ?>

<button type="submit" class="button bg-redlighter right margin-right" id="<?php echo   $id  ?>">Save</button>

    	</div>
    	<div class="col-6">
    		<div class="form padding-jumbo">
    			
<?php if(isset($updateMenu)): ?>
<input type="text" class="form-input menu-name text-large" value="<?php echo   $updateMenu->getName()  ?>"/>
<?php endif; ?>

<?php if(isset($addMenu)): ?>
<input type="text" class="form-input menu-name text-large"/>
<?php endif; ?>

    			<div class="placeholder-text">
    				Menu
    			</div>
    		</div>
    	</div>
    	<div class="col-6">
    		<div class="form padding-jumbo">
    			
<?php if(isset($updateMenu)): ?>
<input type="text" class="form-input slug-name text-large" value="<?php echo   $updateMenu->getSlug()  ?>"/>
<?php endif; ?>

<?php if(isset($addMenu)): ?>
<input type="text" class="form-input slug-name text-large"/>
<?php endif; ?>

    			<div class="placeholder-text">
    				Slug
    			</div>
    		</div>
    	</div>
    	<div class="col-6">
    		<div class="form padding-jumbo">
    			
<?php if(isset($updateMenu)): ?>
<input type="text" class="form-input icon-name text-large" value="<?php echo   $updateMenu->getIcon()  ?>"/>
<?php endif; ?>

<?php if(isset($addMenu)): ?>
<input type="text" class="form-input icon-name text-large"/>
<?php endif; ?>

    			<div class="placeholder-text">
    				Icon
    			</div>
    		</div>
    	</div>
    </form>
  </div>
</div>