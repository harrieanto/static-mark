<?php
namespace StaticMark\Domain\Repository;

/**
 * Post Repository interface.
 *
 * @package	  \StaticMark
 * @author    Hariyanto - harrieanto31@yahoo.com
 * @version   1.0
 * @link      https://www.bandd.web.id
 * @copyright Copyright (C) 2019 Hariyanto
 * @license   https://github.com/harrieanto/StaticMark/blob/master/LICENSE.md
 */
interface PostRepositoryInterface
{
	/**
	 * Get post by the given slug
	 * 
	 * @param string $slug
	 * 
	 * @return \Repository\Component\Collection\Collection
	 */
	public function getBySlug($slug);

	/**	/**
	 * Delete post by the given slug
	 * 
	 * @param string $slug
	 * 
	 * return void
	 */	
	public function deleteBySlug(string $slug);
}