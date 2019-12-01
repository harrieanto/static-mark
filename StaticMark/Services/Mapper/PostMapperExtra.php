<?php
namespace StaticMark\Services\Mapper;

use Repository\Component\Collection\Collection;
use Repository\Component\Support\Str;
use StaticMark\Services\Mark\Head;

/**
 * Post Mapper Extra.
 *
 * @package	  \StaticMark
 * @author    Hariyanto - harrieanto31@yahoo.com
 * @version   1.0
 * @link      https://www.bandd.web.id
 * @copyright Copyright (C) 2019 Hariyanto
 * @license   https://github.com/harrieanto/StaticMark/blob/master/LICENSE.md
 */
class PostMapperExtra
{
	public static function injectHighlight(Collection $post)
	{
		if ($post->isEmpty()) {
			return;
		}
		
		$post->map(function ($items, $index) use ($post) {
			$items['highlight'] = '';
			
			if (isset($items['post'])) {
				$highlight = Str::limitBySpace($items['post']);
				$highlight = preg_replace("/<h[1-6]>.*<\/h[1-6]>/s", '', $highlight);
				
				$items['highlight'] = $highlight;
			}
			
			$post->add($index, $items);
		});
	}
	
	public static function injectHeaderLine(Collection $post)
	{
		if ($post->isEmpty()) {
			return;
		}
		
		$post->map(function ($items, $index) use ($post) {
			$items['heading'] = '';
			
			if (isset($items['pathfile'])) {
				if (file_exists($items['pathfile'])) {
					$head = Head::createFromText(file_get_contents($items['pathfile']));
					$items['heading'] = $head->getHeaderLine();
				}
			}
			
			$post->add($index, $items);
		});
	}
	
	public static function hideOutputPostHeader(Collection $post, int $position = 0)
	{
		if ($post->isEmpty()) {
			return;
		}
		
		$post->map(function ($items, $index) use ($post, $position) {
			if (isset($items['post'])) {
				if (preg_match_all("/<h[1-6]>.*<\/h[1-6]>/", $items['post'], $matches)) {
					$matches = array_shift($matches);
					
					if (isset($matches[$position])) {
						$items['post'] = str_replace($matches[$position], '', $items['post']);
					}
				}
			}
			
			$post->add($index, $items);
		});
	}
	
	public static function getTagBySlug(Collection $post, $slug)
	{
		if ($post->isEmpty()) {
			return;
		}
		
		$post->map(function ($items) use ($slug) {
			if (array_key_exists($slug, $items['tag'])) {
				if (isset($items[$slug])) {
					$slug = $items[$slug];
				}
			}
		});
		
		return $slug;
	}

	public static function hideOutputPostImage(Collection $post, int $position = 0)
	{
		if ($post->isEmpty()) {
			return;
		}
		
		$post->map(function ($items, $index) use ($post, $position) {
			if (isset($items['post'])) {
				if (preg_match_all("/<img.*[\/]?>[<\/img>]?/", $items['post'], $matches)) {
					$matches = array_shift($matches);
					
					if (isset($matches[$position])) {
						$items['post'] = str_replace($matches[$position], '', $items['post']);
					}
				}
			}
			
			$post->add($index, $items);
		});
	}
	
	public static function getImageSource(Collection $post, int $position = 0)
	{
		if ($post->isEmpty()) {
			return;
		}
		
		$source = '';
		
		$post->map(function ($items, $index) use (&$source, $position, $post) {
			if (isset($items['post'])) {
				$dom = new \DOMDocument($items['post']);
				$dom->loadHTML($items['post']);
				$sources = simplexml_import_dom($dom)->xpath("//img/@src");
				
				if (isset($sources[$position])) {
					$source = (string) $sources[$position];
				}
			}
		});
		
		return $source;
	}
}