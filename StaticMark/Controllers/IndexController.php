<?php
namespace StaticMark\Controllers;

use StaticMark\Services\Meta\MetaGenerator;
use StaticMark\Services\Mapper\PostMapperExtra;
use StaticMark\Domain\Repository\RepositoryInterface;
use Repository\Component\Collection\Collection;
use Repository\Component\Support\Str;

/**
 * The Home Page Controller.
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
	public function index()
	{
		$post = $this->repository->getAll();
		
		PostMapperExtra::injectHighlight($post);
		PostMapperExtra::injectHeaderLine($post);
		
		$pagination = $this->createPostPagination($post);
		
		$currentPage = $pagination->getPreviousPosition() + 1;
		$title = $this->generateMetaTitle('Blog', "Page {$currentPage}");
		$description = $this->generateMetaDescription();
		$this->renderMetaRowString($title, $description);
		
		$this->view->withShared('appSubName', '/blog');
		$this->view->withShared('post', $pagination);
		$this->view->to('blog/index');
	}
	
	public function home()
	{
		$title = 'Rahasia Mastah PHP Programmer TERBONGKAR!!!';
		$description = 'Kiat-kiat membangun aplikasi yang solid, adaptable dan maintainable level dasar dengan PHP';
		
		$metas = array(
			'title' => $title, 
			'name' => array(
			  'description' => $description, 
			  'twitter:title' => $title, 
			  'twitter:description' => $description, 
			  'twitter:image' => app_env('APP_HOST') . '/public/images/buku_membangun_laravel_wide.jpg', 
			), 
			'property' => array(
			  'og:title' => $title, 
			  'og:description' => $description, 
			  'og:image' => app_env('APP_HOST') . '/public/images/buku_membangun_laravel_wide.jpg', 
			), 
		);
		
		$meta = new MetaGenerator($metas);
		
		$this->view->withShared('meta', $meta->getMetaAsRawString());
		$this->view->withShared('title', $title);
		$this->view->make('blog/index')->with('home', '');
	}
	
	public function harrieanto()
	{
		$title = 'Hariyanto | Back-end PHP Developer';
		$description = 'Back-end PHP Developer and Author';
		
		$metas = array(
			'title' => $title, 
			'name' => array(
			  'description' => $description, 
			  'twitter:title' => $title, 
			  'twitter:description' => $description, 
			  'twitter:image' => app_env('APP_HOST') . '/public/images/harrieanto.jpg', 
			), 
			'property' => array(
			  'og:title' => $title, 
			  'og:description' => $description, 
			  'og:image' => app_env('APP_HOST') . '/public/images/harrieanto.jpg', 
			), 
		);
		
		$meta = new MetaGenerator($metas);
		$this->view->withShared('title', $title);
		$this->view->withShared('meta', $meta->getMetaAsRawString());
		$this->view->withShared('appSubName', '/Hariyanto');
		$this->view->to('portfolio/index');
	}
}