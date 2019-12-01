<?php
namespace StaticMark\Services\Mark;

/**
 * Generate heading from markdown text.
 *
 * @package	  \StaticMark
 * @author    Hariyanto - harrieanto31@yahoo.com
 * @version   1.0
 * @link      https://www.bandd.web.id
 * @copyright Copyright (C) 2019 Hariyanto
 * @license   https://github.com/harrieanto/StaticMark/blob/master/LICENSE.md
 */
class Head
{
	/**
	 * The markdown text
	 * @var string $markdownText
	 */
	private $markdownText;

	/**
	 * @param string $markdownText
	 */	
	public function __construct($markdownText)
	{
		$this->markdownText = $markdownText;
	}

	/**
	 * Create markdown text from text string
	 * 
	 * @param string $text
	 * 
	 * @return string
	 */	
	public static function createFromText($text)
	{
		return new static($text);
	}

	/**
	 * Gnt heading 1
	 * 
	 * @param string $markdownText
	 * 
	 * @return string
	 */	
	public function h1(string $markdownText)
	{
		if (preg_match_all("/^\#{1}[^\#].+/m", $markdownText, $matches)) {
			return $this->getMatches($matches);
		}
	}

	/**
	 * Gnt heading 2
	 * 
	 * @param string $markdownText
	 * 
	 * @return string
	 */	
	public function h2(string $markdownText)
	{
		if (preg_match_all("/^\#{2}[^\#].+/m", $markdownText, $matches)) {
			return $this->getMatches($matches);
		}
	}

	/**
	 * Gnt heading 3
	 * 
	 * @param string $markdownText
	 * 
	 * @return string
	 */	
	public function h3(string $markdownText)
	{
		if (preg_match_all("/^\#{3}[^\#].+/m", $markdownText, $matches)) {
			return $this->getMatches($matches);
		}
	}

	/**
	 * Gnt heading 4
	 * 
	 * @param string $markdownText
	 * 
	 * @return string
	 */	
	public function h4(string $markdownText)
	{
		if (preg_match_all("/^\#{4}[^\#].+/m", $markdownText, $matches)) {
			return $this->getMatches($matches);
		}
	}

	/**
	 * Gnt heading 5
	 * 
	 * @param string $markdownText
	 * 
	 * @return string
	 */	
	public function h5(string $markdownText)
	{
		if (preg_match_all("/^\#{5}[^\#].+/m", $markdownText, $matches)) {
			return $this->getMatches($matches);
		}
	}

	/**
	 * Gnt heading 6
	 * 
	 * @param string $markdownText
	 * 
	 * @return string
	 */	
	public function h6(string $markdownText)
	{
		if (preg_match_all("/^\#{6}[^\#].+/m", $markdownText, $matches)) {
			return $this->getMatches($matches);
		}
	}

	/**
	 * Gnt header by the given line
	 * 
	 * @param int $line The heading order
	 * @param string The heading level
	 * 
	 * @return string
	 */	
	public function getHeaderLine($line = 0, $type = 'h1')
	{
		if (isset($this->{$type}($this->markdownText)[$line])) {
			return $this->{$type}($this->markdownText)[$line];
		}
		
		return false;
	}

	/**
	 * Get heading matches
	 * 
	 * @param string $matches
	 * 
	 * @return string
	 */	
	private function getMatches($matches)
	{
		foreach ((array) $matches as $match) {
			if (!ctype_alpha($match)) {
				return preg_replace("/[^a-zA-Z0-9\s]+/", '', $match);
			}
		}
	}
}