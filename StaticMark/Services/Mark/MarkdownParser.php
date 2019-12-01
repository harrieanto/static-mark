<?php
namespace StaticMark\Services\Mark;

use ParsedownExtra;
use StaticMark\Services\Mark\Contracts\ParserInterface;

/**
 * Parsedown Adapter.
 *
 * @package	  \StaticMark
 * @author    Hariyanto - harrieanto31@yahoo.com
 * @version   1.0
 * @link      https://www.bandd.web.id
 * @copyright Copyright (C) 2019 Hariyanto
 * @license   https://github.com/harrieanto/StaticMark/blob/master/LICENSE.md
 */
class MarkdownParser implements ParserInterface
{
	/**
	 * The \ParsedownExtra instance
	 * @var \ParsedownExtra $parser
	 */
	private $parser;
	
	public function __construct()
	{
		$this->parser = new ParsedownExtra;
	}

	/**
	 * Parse markdown text to html format
	 * 
	 * @param string $markdownText
	 * 
	 * @return string The parsed markdown text
	 */	
	public function text(string $markdownText)
	{
		$markdownText = $this->removeYamlMeta($markdownText);
		return $this->parser->text($markdownText);
	}
	
	/**
	 * Parse markdown line string to html format
	 * 
	 * @param string $markdownText
	 * 
	 * @return string The parsed markdown line string
	 */
	public function line(string $markdownText)
	{
		$markdownText = $this->removeYamlMeta($markdownText);
		return $this->parser->line($markdownText);
	}

	/**
	 * Remove meta data from markdown text
	 * 
	 * @param string $markdownText
	 * 
	 * @return string
	 */	
	private function removeYamlMeta(string $markdownText)
	{
		return trim(preg_replace("/-{3}(.+)-{3}/sm", '', $markdownText));
	}
}