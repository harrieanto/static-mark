<?php
namespace StaticMark\Services\Mapper\Payload;

use StaticMark\Services\Mapper\Contracts\CollectionInterface;
use StaticMark\Services\Mapper\Contracts\MapperInterface;

/**
 * Post Advertisment Payload.
 *
 * @package	  \StaticMark
 * @author    Hariyanto - harrieanto31@yahoo.com
 * @version   1.0
 * @link      https://www.bandd.web.id
 * @copyright Copyright (C) 2019 Hariyanto
 * @license   https://github.com/harrieanto/StaticMark/blob/master/LICENSE.md
 */
class Advert implements MapperInterface
{
	/**
	 * The Call to Action
	 * @var string $cta
	 */
	private $cta;

	/**
	 * The advert title
	 * @var string $title
	 */
	private $title;

	/**
	 * The Call to Action contact
	 * @var string $contact
	 */
	private $contact;

	/**
	 * The advert description
	 * @var string $description
	 */
	private $description;

	/**
	 * The default advert image path
	 * @var string $defaultimagePath
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
	
	public function setCallToAction(string $cta)
	{
		$this->cta = $cta;
	}

	public function setTitle(string $title)
	{
		$this->title = $title;
	}
	
	public function setContact(string $contact)
	{
		$this->contact = $contact;
	}

	public function setDescription(string $description)
	{
		$this->description = $description;
	}
	
	public function setImagePath(string $path)
	{
		$this->defaultImagePath = $path;
	}

	private function createAdvertMaps()
	{
		return array(
			'cta' => $this->cta, 
			'title' => $this->title, 
			'contact' => $this->contact, 
			'image' => $this->defaultImagePath, 
			'description' => $this->description
		);
	}

	public function map(array $mappers)
	{
		$adverts = $this->createAdvertMaps();
		$this->collection->add('advert', array());
		
		if (isset($mappers['advert'])) {
			$mappers = $mappers['advert'];

			if (isset($mappers['cta'])) {
				$adverts['cta'] = $mappers['cta'];
			}

			if (isset($mappers['title'])) {
				$adverts['title'] = $mappers['title'];
			}

			if (isset($mappers['contact'])) {
				$adverts['contact'] = $mappers['contact'];
			}

			if (isset($mappers['image'])) {
				$adverts['image'] = $mappers['image'];
			}
			
			if (isset($mappers['description'])) {
				$adverts['description'] = $mappers['description'];
			}
		}
		
		$this->collection->add('advert', $adverts);
	}
	
	public function getArrayCollection()
	{
		return $this->collection;
	}
}