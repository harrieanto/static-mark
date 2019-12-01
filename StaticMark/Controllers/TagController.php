<?php
namespace StaticMark\Controllers;

use StaticMark\Services\Mapper\PostMapperExtra;
use StaticMark\Domain\Repository\RepositoryInterface;
use Repository\Component\Collection\Collection;
use Repository\Component\Support\Str;

/**
 * The Blog Post Tag Controller.
 *
 * @package	  \StaticMark
 * @author    Hariyanto - harrieanto31@yahoo.com
 * @version   1.0
 * @link      https://www.bandd.web.id
 * @copyright Copyright (C) 2019 Hariyanto
 * @license   https://github.com/harrieanto/StaticMark/blob/master/LICENSE.md
 */
class TagController extends AbstractController
{	
	public function index($tag)
	{
		$post = $this->repository->getByTag($tag);
		
		if (empty($post->all())) {
			return $this->app->abort(404, 'Page Not Found');
		}
		
		PostMapperExtra::injectHighlight($post);
		PostMapperExtra::injectHeaderLine($post);
		
		$pagination = $this->createPostPagination($post);
		
		$currentPage = $pagination->getPreviousPosition() + 1;
		$tagString = $post[0]['tag'][$tag];
		$title = $this->generateMetaTitle($tagString, "Page {$currentPage}");
		$description = $this->generateMetaDescription();
		$this->renderMetaRowString($title, $description);
		
		$postItem = Collection::make(array());
		$postItem->add(route('blog'), 'Blog');
		$postItem->push($tagString);

		$this->view->withShared('currentTag', $tag);
		$this->view->withShared('currentPages', $postItem->all());
		$this->view->withShared('appSubName', '/blog');
		$this->view->withShared('tag', $pagination);
		$this->view->to('blog/index');
	}
}