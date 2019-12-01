<?php
namespace StaticMark\Controllers;

use App\Http\Controllers\Controller;
use StaticMark\Services\View\View;
use StaticMark\Services\Meta\MetaGenerator;
use StaticMark\Services\Mapper\PostMapperExtra;
use StaticMark\Domain\Repository\RepositoryInterface;
use Repository\Component\Collection\Collection;

/**
 * The Blog Post Read Controller.
 *
 * @package	  \StaticMark
 * @author    Hariyanto - harrieanto31@yahoo.com
 * @version   1.0
 * @link      https://www.bandd.web.id
 * @copyright Copyright (C) 2019 Hariyanto
 * @license   https://github.com/harrieanto/StaticMark/blob/master/LICENSE.md
 */
class ReadController extends AbstractController
{
	public function index($slug, $optional = null)
	{
		if ($optional !== null) {
			$this->readByTag($slug, $optional);
			return;
		}
		
		$this->readBySlug($slug);
	}
	
	private function readBySlug($slug)
	{
		$post = $this->repository->getBySlug($slug);
		
		if (empty($post->all())) {
			return $this->app->abort(404, 'Page Not Found');
		}
		
		PostMapperExtra::injectHeaderLine($post);
		PostMapperExtra::hideOutputPostHeader($post);
		$highlightImage = PostMapperExtra::getImageSource($post);
		PostMapperExtra::hideOutputPostImage($post);
		
		$post = $post->all();
		$post = Collection::make(array_shift($post));
		$post->add('highlight_image', $highlightImage);
		$post->add('url', route('blog.read', $slug));
		$post->add('slug', $slug);
		
		$meta = new MetaGenerator($post['meta']);
		$meta = $meta->getMetaAsRawString();
		
		$postItem = Collection::make(array());
		$postItem->add(route('blog'), 'Blog');
		$postItem->push($post->get('heading'));

		$this->view->withShared('appSubName', '/blog');
		$this->view->withShared('currentPages', $postItem->all());
		$this->view->withShared('readPost', $post);
		$this->view->withShared('meta', $meta);
		$this->view->to('blog/index');
	}

	public function readByTag($tagSlug, $postSlug)
	{
		$tag = $this->repository->getByTag($tagSlug);
		$post = $this->repository->getBySlug($postSlug);
		
		if (empty($tag->all()) || empty($post->all())) {
			return $this->app->abort(404, 'Page Not Found');
		}
		
		PostMapperExtra::injectHeaderLine($post);
		$highlightImage = PostMapperExtra::getImageSource($post);
		PostMapperExtra::hideOutputPostHeader($post);
		PostMapperExtra::hideOutputPostImage($post);
		$tag = PostMapperExtra::getTagBySlug($post, $tagSlug);
		
		$post = $post->all();
		$post = Collection::make(array_shift($post));
		$post->add('highlight_image', $highlightImage);
		$post->add('url', route('blog.tag.read', $tagSlug, $postSlug));
		$post->add('slug', $postSlug);
		
		$meta = new MetaGenerator($post['meta']);
		$meta = $meta->getMetaAsRawString();
		
		$postItem = Collection::make(array());
		$postItem->add(route('blog'), 'Blog');
		$postItem->add(route('blog.tag', $tagSlug), $tag);
		$postItem->push($post->get('heading'));
		
		$this->view->withShared('currentPages', $postItem->all());
		$this->view->withShared('appSubName', '/blog');
		$this->view->withShared('readPost', $post);
		$this->view->withShared('meta', $meta);
		$this->view->to('blog/index');
	}
}