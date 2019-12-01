<?php
namespace StaticMark\Controllers;

use StaticMark\Services\View\View;
use App\Http\Controllers\Controller;
use StaticMark\Services\Meta\MetaGenerator;
use StaticMark\Domain\Repository\RepositoryInterface;
use StaticMark\Services\Mapper\Contracts\MapperInterface;

class AbstractController extends Controller
{
	/** @var int The limit per page **/
	const LIMIT_PER_PAGE = 2;

	public function __construct(MapperInterface $mapper, RepositoryInterface $repository, View $view)
	{
		$this->mapper = $mapper;
		$this->repository = $repository;
		$this->view = $view;
	}

	protected function createPostPagination($post)
	{
		$pagination = $this->app['pagination'];
		$pagination->make($post);
		$pagination->setTotalItem($post->count());
		$path = $this->app['request']->getCurrentUri();
		$uri = $this->app['uri']->withHost(app_env('APP_HOST'));
		$uri->withPath($path);
		$pagination->setUri($uri);
		$pagination->setLimit(self::LIMIT_PER_PAGE);
		$pagination->setPreviousMarker('Previous');
		$pagination->setNextMarker('Next');
		$pagination->paginate();
		
		return $pagination;
	}
	
	protected function generateMetaDescription()
	{
		$description = app_env('APP_NAME') . ' blog, ';
		$description.= app_env('APP_USERNAME') . ' blog';
		
		return $description;
	}
	
	protected function generateMetaTitle(...$titles)
	{
		$title = implode(' | ', $titles);
		$title = ucwords($title);
		
		return $title;
	}
	
	protected function renderMetaRowString($title, $description)
	{
		$metas = array(
			'title' => $title, 
			'name' => array(
			  'description' => $description, 
			  'twitter:title' => $title, 
			  'twitter:description' => $description, 
			), 
			'property' => array(
			  'og:title' => $title, 
			  'og:description' => $description
			), 
		);
		
		$meta = new MetaGenerator($metas);
		$this->view->withShared('meta', $meta->getMetaAsRawString());
	}
}