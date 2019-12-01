<?php
namespace StaticMark\Services\View\Shared;

use Repository\Component\Support\Facades\Html;
use Repository\Component\View\ViewShared as AbstractViewShared;

/**
 * Flash Shared Variable.
 *
 * @package	  \StaticMark
 * @author    Hariyanto - harrieanto31@yahoo.com
 * @version   1.0
 * @link      https://www.bandd.web.id
 * @copyright Copyright (C) 2019 Hariyanto
 * @license   https://github.com/harrieanto/StaticMark/blob/master/LICENSE.md
 */
class Flash extends AbstractViewShared
{
	/**
	 * Register shared variables to the view handler
	 * 
	 * @return void
	 */	
	public function registerSharedVariable()
	{
		$flash = $this->app['session']->get('flash', false);
		
		if ($flash !== false) {
			$this->view->withShared('flash', $flash);
		}
	}
}
