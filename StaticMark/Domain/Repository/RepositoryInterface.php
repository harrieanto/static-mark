<?php
namespace StaticMark\Domain\Repository;

/**
 * Repository interface.
 *
 * @package	  \StaticMark
 * @author    Hariyanto - harrieanto31@yahoo.com
 * @version   1.0
 * @link      https://www.bandd.web.id
 * @copyright Copyright (C) 2019 Hariyanto
 * @license   https://github.com/harrieanto/StaticMark/blob/master/LICENSE.md
 */
interface RepositoryInterface
{
	/**
	 * Delete all posts
	 * 
	 * @return \Repository\Component\Collection\Collection
	 */		
	public function getAll();
	
	/**
	 * persist post to the actual storage
	 * 
	 * @return void
	 */
	public function persist();
}