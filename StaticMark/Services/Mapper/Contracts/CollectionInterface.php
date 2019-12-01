<?php
namespace StaticMark\Services\Mapper\Contracts;

/**
 * Array Collection Interface.
 *
 * @package	  \StaticMark
 * @author    Hariyanto - harrieanto31@yahoo.com
 * @version   1.0
 * @link      https://www.bandd.web.id
 * @copyright Copyright (C) 2019 Hariyanto
 * @license   https://github.com/harrieanto/StaticMark/blob/master/LICENSE.md
 */
interface CollectionInterface
{
	/**
	 * @{inheritdoc}
	 * See \Repository\Component\Collection\Collection::add()
	 */
	public function add($key, $value);

	/**
	 * @{inheritdoc}
	 * See \Repository\Component\Collection\Collection::get()
	 */
	public function get($key);

	/**
	 * @{inheritdoc}
	 * See \Repository\Component\Collection\Collection::has()
	 */
	public function has($key);

	/**
	 * @{inheritdoc}
	 * See \Repository\Component\Collection\Collection::all)
	 */
	public function all();

	/**
	 * @{inheritdoc}
	 * See \Repository\Component\Collection\Collection::flush()
	 */
	public function flush();

	/**
	 * @{inheritdoc}
	 * See \Repository\Component\Collection\Collection::push()
	 */
	public function push($values);
}