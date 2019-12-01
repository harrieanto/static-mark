<?php
namespace StaticMark\Controllers\Dashboard;

/**
 * Login Controller.
 *
 * @package	  \StaticMark
 * @author    Hariyanto - harrieanto31@yahoo.com
 * @version   1.0
 * @link      https://www.bandd.web.id
 * @copyright Copyright (C) 2019 Hariyanto
 * @license   https://github.com/harrieanto/StaticMark/blob/master/LICENSE.md
 */
class LoginController extends AbstractController
{
	public function index()
	{
		$meta = $this->generateMetaFromArray(array('title' => 'Login'));
		
		$this->view->withShared('meta', $meta);
		$this->view->make('dashboard/index')->with('login', '');
	}
}