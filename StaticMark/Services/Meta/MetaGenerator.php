<?php
namespace StaticMark\Services\Meta;

use Repository\Component\Support\Statics\Html;

/**
 * HTML Meta Generator.
 *
 * @package	  \StaticMark
 * @author    Hariyanto - harrieanto31@yahoo.com
 * @version   1.0
 * @link      https://www.bandd.web.id
 * @copyright Copyright (C) 2019 Hariyanto
 * @license   https://github.com/harrieanto/StaticMark/blob/master/LICENSE.md
 */
class MetaGenerator
{
	/**
	 * The custom html metas
	 * @var array $items
	 */
	private $items = array();
	
	/**
	 * @param array $items The custom html metas
	 */
	public function __construct(array $items = array())
	{
		$this->setMetaPayload($items);
	}
	
	/**
	 * Set custom html metas
	 * @param array $items
	 */
	private function setMetaPayload(array $items)
	{
		$title = '';
		$description = '';
		
		if (isset($items['title'])) {
			$title = $items['title'];
		}
		
		if (isset($items['name']['description'])) {
			$description = $items['name']['description'];
		}
		
		$defaults = $this->generateDefaultMetas($title, $description);
		$this->items = array_replace_recursive($defaults, $items);
	}
	
	/**
	 * Generate html default metas
	 * 
	 * @param string $title The title meta
	 * @param string $description The description meta
	 *  
	 * @return array The list of default meta
	 */
	private function generateDefaultMetas($title, $description)
	{
		$metas = array(
			'title' => $title, 
			'name' => array(
			  'description' => $description, 
			  'twitter:card' => 'summary', 
			  'twitter:site' => app_env('APP_TWITTER'), 
			  'twitter:title' => $title, 
			  'twitter:description' => $description, 
			  'twitter:creator' => app_env('APP_TWITTER'), 
			  //Choose large image over small
			  //At least 120px * 120px
			  //No larger than 1Mb
			  'twitter:image' => app_env('APP_HOST') . DS . 'public/images/twitter_default_image.jpg', 
			), 
			'property' => array(
			  'og:title' => $title, 
			  'og:type' => 'article', 
			  'og:url' => app_env('APP_HOST'), 
			  //Choose large image over small
			  //At least 200px * 200px
			  //1200 * 630 is recommended
			  'og:image' => app_env('APP_HOST') . DS . 'public/images/og_default_image.jpg', 
			  'og:site_name' => app_env('APP_NAME'), 
			  'og:description' => $description
			), 
		);
		
		return $metas;
	}
	
	/**
	 * Get title tag line string
	 * 
	 * @return string The httml title tag
	 */
	private function getTitleLineString()
	{
		$title = Html::tag('title', $this->items['title']) . "\n";
		
		return $title;
	}
	
	/**
	 * Get html meta as raw string
	 * 
	 * @return string
	 */
	public function getMetaAsRawString()
	{
		$meta = '';
		$title = $this->getTitleLineString();
		
		array_shift($this->items);
		
		foreach ((array) $this->items as $type => $items) {
			foreach ((array) $items as $key => $item) {
				$meta .= "<meta $type=\"{$key}\" content=\"{$item}\"/>\n";
			}
		}
		
		return $title . $this->getOgHeadLineString() . $meta;
	}
	
	/**
	 * Get head prefix for opengraph meta property
	 * 
	 * @return string
	 */
	private function getOgHeadLineString()
	{
		$prefix = 'og: http://ogp.me/ns# fb: http://ogp.me/fb# article: http://ogp.me/article#';
		
		return sprintf('<head prefix="%s">', $prefix) . "\n";
	}
}