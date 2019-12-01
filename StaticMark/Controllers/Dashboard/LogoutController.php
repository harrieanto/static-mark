<?php
namespace StaticMark\Controllers\Dashboard;

use Repository\Component\Support\Statics\ResponseRedirect;

/**
 * Logout Controller.
 *
 * @package	  \StaticMark
 * @author    Hariyanto - harrieanto31@yahoo.com
 * @version   1.0
 * @link      https://www.bandd.web.id
 * @copyright Copyright (C) 2019 Hariyanto
 * @license   https://github.com/harrieanto/StaticMark/blob/master/LICENSE.md
 */
class LogoutController extends AbstractController
{
	public function index()
	{
		$this->app['session']->forget('signed_credential');
		
		ResponseRedirect::make('dashboard/login')->with('flash', 'You have loggged');
	}
}