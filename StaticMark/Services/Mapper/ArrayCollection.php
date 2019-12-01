<?php
namespace StaticMark\Services\Mapper;

use Repository\Component\Collection\Collection;
use StaticMark\Services\Mapper\Contracts\CollectionInterface;

/**
 * Array Collection Adapter.
 *
 * @package	  \StaticMark
 * @author    Hariyanto - harrieanto31@yahoo.com
 * @version   1.0
 * @link      https://www.bandd.web.id
 * @copyright Copyright (C) 2019 Hariyanto
 * @license   https://github.com/harrieanto/StaticMark/blob/master/LICENSE.md
 */
class ArrayCollection implements CollectionInterface
{
	/**
	 * The collection instance
	 * @var \Repository\Component\Collection\Collection $collection
	 */
	private $collection;
	
	public function __construct()
	{
		$this->collection = Collection::make(array());
	}

	/**
	 * @{inheritdoc}
	 * See \StaticMark\Services\Mapper\Contracts\CollectionInterface::add()
	 */	
	public function add($key, $value)
	{
		$this->collection->add($key, $value);
	}

	/**
	 * @{inheritdoc}
	 * See \StaticMark\Services\Mapper\Contracts\CollectionInterface::get()
	 */	
	public function get($key)
	{
		$this->collection->get($key);
	}

	/**
	 * @{inheritdoc}
	 * See \StaticMark\Services\Mapper\Contracts\CollectionInterface::has()
	 */	
	public function has($key)
	{
		$this->collection->has($key);
	}

	/**
	 * @{inheritdoc}
	 * See \StaticMark\Services\Mapper\Contracts\CollectionInterface::all()
	 */	
	public function all()
	{
		return $this->collection->all();
	}

	/**
	 * @{inheritdoc}
	 * See \StaticMark\Services\Mapper\Contracts\CollectionInterface::flush()
	 */	
	public function flush()
	{
		$this->collection->flush();
	}

	/**
	 * @{inheritdoc}
	 * See \StaticMark\Services\Mapper\Contracts\CollectionInterface::push()
	 */	
	public function push($values)
	{
		$this->collection->push($values);
	}
}