<?php
namespace StaticMark\Persistence;

use Repository\Component\Cache\Repository;
use Repository\Component\Collection\Collection;
use StaticMark\Domain\Repository\RepositoryInterface;
use StaticMark\Services\Mark\Contracts\ParserInterface;
use StaticMark\Services\Mapper\Contracts\MapperInterface;

/**
 * Post File Repository.
 *
 * @package	  \StaticMark
 * @author    Hariyanto - harrieanto31@yahoo.com
 * @version   1.0
 * @link      https://www.bandd.web.id
 * @copyright Copyright (C) 2019 Hariyanto
 * @license   https://github.com/harrieanto/StaticMark/blob/master/LICENSE.md
 */
class PostRepository implements RepositoryInterface
{
	/**
	 * @param \StaticMark\Services\Mark\Contracts\ParserInterface
	 * @param \Repository\Component\Cache\Repository
	 * @param \StaticMark\Services\Mapper\Contracts\MapperInterface
	 */
	public function __construct(ParserInterface $parser, Repository $cache, MapperInterface $mapper)
	{
		$this->cache = $cache;
		$this->parser = $parser;
		$this->mapper = $mapper;
		$this->mappers = $mapper->getMappers();
	}

	/**
	 * Delete post by the given slug
	 * 
	 * @param string $slug
	 * 
	 * return void
	 */	
	public function deleteBySlug(string $slug)
	{
		$post = $this->getBySlug($slug);
		
		if (!empty($post)) {
			$pathToFile = $post->get(0)['pathfile'];
			$this->cache->forget($pathToFile);
			
			if (file_exists($pathToFile)) {
				unlink($pathToFile);
			}
		}
	}

	/**
	 * Delete all posts
	 * 
	 * @return \Repository\Component\Collection\Collection
	 */		
	public function getAll()
	{
		$posts = array();
		
		foreach ($this->mappers as $path => $attributes) {
			if ($this->cache->has($path)) {
				$post = ['post' => $this->cache->get($path)['payload']];
				$posts[] = array_merge($post, $this->mappers[$path]);
			}
		}
		
		return Collection::make($posts);
	}

	/**
	 * Get post by the given slug
	 * 
	 * @param string $slug
	 * 
	 * @return \Repository\Component\Collection\Collection
	 */
	public function getBySlug($slug)
	{
		$posts = array();
		
		foreach ($this->mappers as $path => $attributes) {
			if ($slug === $attributes['slug']) {
				$post = ['post' => $this->cache->get($path)['payload']];
				$posts[] = array_merge($post, $this->mappers[$path]);
			}
		}
		
		return Collection::make($posts);
	}

	/**
	 * Get post by the given tag slug
	 * 
	 * @param string $tag
	 * 
	 * @return \Repository\Component\Collection\Collection
	 */
	public function getByTag($tag)
	{
		$posts = array();
		
		foreach ($this->mappers as $path => $attributes) {
			if (array_key_exists($tag, $attributes['tag'])) {
				$post = ['post' => $this->cache->get($path)['payload']];
				$posts[] = array_merge($post, $this->mappers[$path]);
			}
		}
		
		return Collection::make($posts);
	}

	/**
	 * persist post to the actual storage
	 * 
	 * @return void
	 */	
	public function persist()
	{
		foreach ($this->mappers as $path => $attributes) {
			if (file_exists($path)) {
				$markdownText = file_get_contents($path);
				$parsedMarkdownText = $this->parser->text($markdownText);
				
				if ($this->mapper->shouldRemap($path, true)) {
					$this->cache->put($path, $parsedMarkdownText, 30);
				}
			}
		}
	}
}