<?php
namespace StaticMark\Services\View;

use Repository\Component\Config\Config;
use StaticMark\Services\View\Shared\Flash;
use StaticMark\Services\View\Shared\Link;
use Repository\Component\View\View as ExtendedView;

/**
 * View Handler.
 *
 * @package	  \StaticMark
 * @author    Hariyanto - harrieanto31@yahoo.com
 * @version   1.0
 * @link      https://www.bandd.web.id
 * @copyright Copyright (C) 2019 Hariyanto
 * @license   https://github.com/harrieanto/StaticMark/blob/master/LICENSE.md
 */
class View extends ExtendedView
{
	/**
	 * (Override) Register shared variables to the view handler
	 * 
	 * @param array $shareds The list of shared class
	 *  
	 * @return void
	 */	
	public function registerShared(array $shareds = array())
	{
		$shareds = array(
			Flash::class, 
			Link::class, 
		);

		parent::registerShared($shareds);
	}

	/**
	 * Override view basepath
	 * @return string The new view basepath
	 */
	public function basepath()
	{
		return $this->getBasepath();
	}

	/**
	 * Get new view basepath
	 * @return string The new view basepath
	 */	
	private static function getBasepath()
	{
		$basepath = Config::get('static-mark')['view']['basepath'];
		
		return $basepath;
	}
}