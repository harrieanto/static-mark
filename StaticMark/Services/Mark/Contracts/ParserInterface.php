<?php
namespace StaticMark\Services\Mark\Contracts;

/**
 * Markdown parser interface.
 *
 * @package	  \StaticMark
 * @author    Hariyanto - harrieanto31@yahoo.com
 * @version   1.0
 * @link      https://www.bandd.web.id
 * @copyright Copyright (C) 2019 Hariyanto
 * @license   https://github.com/harrieanto/StaticMark/blob/master/LICENSE.md
 */
interface ParserInterface
{
	/**
	 * Parse markdown text to html format
	 * 
	 * @param string $markdownText
	 * 
	 * @return string The parsed markdown text
	 */	
	public function text(string $markdownText);
	
	/**
	 * Parse markdown line string to html format
	 * 
	 * @param string $markdownText
	 * 
	 * @return string The parsed markdown line string
	 */
	public function line(string $markdownText);
}