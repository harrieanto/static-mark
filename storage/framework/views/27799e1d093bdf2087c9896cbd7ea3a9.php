<?php

/**
 *
 * Author : harrieanto31@yahoo.com | Web:http://bandd.web.id
 * -----------------------------------------------------------------
 * Created : 08/Oct/2019 04:42:09 PM
 * This view has been produced by RTE Template Engine
 * automaticly
 * As Repository PHP Framework Components
 * -----------------------------------------------------------------
 * Github : https://github.com/harrieanto
 *
 **/


require_once __DIR__.'/../../../vendor/autoload.php';

?>
<div class="site-search bg-white" id="finder">
	<div class="container-fluid">
		<div class="row">
		  <div class="site-search-close-container">
 			  <div class="site-search-close-button text-center margin-top-24 bg-semiclouds">
 			    <div class="menu-icon-line-1 menu-icon-line bg-black"></div>
 			    <div class="menu-icon-line-2 menu-icon-line bg-black"></div>
 			    <div class="menu-icon-line-3 menu-icon-line bg-black"></div>
        </div>
      </div>
      <div class="col-12">
        <form class="form margin-top-64" id="finder-form">
          <button type="submit" class="hidden">Submit</button>
          <input type="text" class="form-input padding-24 text-large" id="finder-input"/>
          <div class="input-text-placeholder">
            <span class="text-blacklighter">What you're looking for?</span>
          </div>
          <div class="input-icon-placeholder">
            <i class="icon ion-ios-search text-black text-xlarge"></i>
          </div>
    		</form>
      </div>
      <div class="col-12 text-left">
      	<div id="finder-result" class="padding-medium text-black text-left">
      	</div>
      	<div id="finder-unavailable" class="hidden">
      	  <p class="text-center text-blacklighter">You have reached the end of results</p>
      	</div>
      	<div id="finder-loading" class="hidden">
      	  <center><span class="loading-spinner text-red"></span></center>
      	</div>
      </div>
    </div>
  </div>
</div>
