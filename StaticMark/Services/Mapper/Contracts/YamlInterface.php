<?php
namespace StaticMark\Services\Mapper\Contracts;

/**
 * Yaml interface.
 *
 * @package	  \StaticMark
 * @author    Hariyanto - harrieanto31@yahoo.com
 * @version   1.0
 * @link      https://www.bandd.web.id
 * @copyright Copyright (C) 2019 Hariyanto
 * @license   https://github.com/harrieanto/StaticMark/blob/master/LICENSE.md
 */
interface YamlInterface
{
	/**
	 * Parse yaml file into array
	 * 
	 * @param string $path The yaml path file
	 * 
	 * @return array
	 */
	public function parse(string $path);

	/**
	 * Parse array into yaml file
	 * 
	 * @param string|array $values
	 * 
	 * @return string
	 */
	public function dump($values);
}