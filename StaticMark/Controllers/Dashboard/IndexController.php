<?php
namespace StaticMark\Controllers\Dashboard;

use StaticMark\Services\Meta\MetaGenerator;
use StaticMark\Services\Mapper\PostMapperExtra;

/**
 * Dashboard Controller.
 *
 * @package	  \StaticMark
 * @author    Hariyanto - harrieanto31@yahoo.com
 * @version   1.0
 * @link      https://www.bandd.web.id
 * @copyright Copyright (C) 2019 Hariyanto
 * @license   https://github.com/harrieanto/StaticMark/blob/master/LICENSE.md
 */
class IndexController extends AbstractController
{
	/**
	 * Render to the dashboard view handler
	 * @return void|null
	 */
	public function index()
	{
		$post = $this->repository->getAll();
		
		PostMapperExtra::injectHighlight($post);
		PostMapperExtra::injectHeaderLine($post);
		
		$pagination = $this->app['pagination'];
		$pagination->make($post);
		$pagination->setTotalItem($post->count());
		$path = $this->app['request']->getCurrentUri();
		$uri = $this->app['uri']->withHost(app_env('APP_HOST'));
		$uri->withPath($path);
		$pagination->setUri($uri);
		$pagination->setLimit(10);
		$pagination->setPreviousMarker('Previous');
		$pagination->setNextMarker('Next');
		$pagination->paginate();
		
		$meta = $this->generateMetaFromArray(array('title' => 'Post'));
		
		$this->view->withShared('meta', $meta);
		$this->view->withShared('post', $pagination);
		$this->view->to('dashboard/index');
	}
}