<?php
namespace StaticMark\Services\Mapper\Payload;

use StaticMark\Services\Mapper\Contracts\MapperInterface;
use StaticMark\Services\Mapper\Contracts\CollectionInterface;

/**
 * Post Craetor Payload.
 *
 * @package	  \StaticMark
 * @author    Hariyanto - harrieanto31@yahoo.com
 * @version   1.0
 * @link      https://www.bandd.web.id
 * @copyright Copyright (C) 2019 Hariyanto
 * @license   https://github.com/harrieanto/StaticMark/blob/master/LICENSE.md
 */
class PostCreator implements MapperInterface
{
	/**
	 * The creator username
	 * @var string $username
	 */
	private $username;

	/**
	 * The creator site url
	 * @var string $siteUrl
	 */
	private $siteUrl;

	/**
	 * The creator profile
	 * @var string $about
	 */
	private $about;

	/**
	 * The creator profile picture
	 * @var string $defaultiMagePath
	 */
	private $defaultImagePath;

	/**
	 * The array collection interface
	 * @var \StaticMark\Services\Mapper\Contracts\CollectionInterface
	 */
	private $collection;

	/**
	 * @param \StaticMark\Services\Mapper\Contracts\CollectionInterface
	 */		
	public function __construct(CollectionInterface $collection)
	{
		$this->collection = $collection;
	}

	public function setUsername(string $username)
	{
		$this->username = $username;
	}
	
	public function setWebsiteUrl(string $url)
	{
		$this->siteUrl = $url;
	}

	public function setAbout(string $about)
	{
		$this->about = $about;
	}
		
	public function setDefaultImagePath(string $path)
	{
		$this->defaultImagePath = $path;
	}

	private function createCreatorMaps()
	{
		return array(
			'name' => $this->username, 
			'picture' => $this->defaultImagePath, 
			'about' => $this->about, 
			'site' => $this->siteUrl, 
		);
	}
	
	public function map(array $mappers)
	{
		$creators = $this->createCreatorMaps();
		
		if (isset($mappers['creator']['name'])) {
			$creators['name'] = $mappers['creator']['name'];
		}

		if (isset($mappers['creator']['picture'])) {
			$creators['picture'] = $mappers['creator']['picture'];
		}

		if (isset($mappers['creator']['about'])) {
			$creators['about'] = $mappers['creator']['about'];
		}

		if (isset($mappers['creator']['site'])) {
			$creators['site'] = $mappers['creator']['site'];
		}
		
		$this->collection->add('creator', $creators);
	}
}