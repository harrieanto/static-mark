<?php
namespace StaticMark\Services\Mapper\Factory;

use StaticMark\Services\Mapper\Yaml;
use StaticMark\Services\Mapper\PostMapper;
use StaticMark\Services\Mapper\Payload\Advert;
use StaticMark\Services\Mapper\ArrayCollection;
use StaticMark\Services\Mapper\Payload\PostCreator;
use Repository\Component\Contracts\Container\ContainerInterface;

/**
 * Post Mapper Factory.
 *
 * @package	  \StaticMark
 * @author    Hariyanto - harrieanto31@yahoo.com
 * @version   1.0
 * @link      https://www.bandd.web.id
 * @copyright Copyright (C) 2019 Hariyanto
 * @license   https://github.com/harrieanto/StaticMark/blob/master/LICENSE.md
 */
class MapperFactory
{
	/**
	 * The application instance
	 * @var \Repository\Component\Contracts\Container\ContainerInterface $app
	 */
	private $app;
	
	/**
	 * @param \Repository\Component\Contracts\Container\ContainerInterfacce
	 */	
	public function __construct(ContainerInterface $app)
	{
		$this->app = $app;
	}

	/**
	 * Create post mappers
	 * 
	 * @return \StaticMark\Services\Mapper\Contracts\MapperInterface
	 */	
	public function create()
	{
		$path = $this->app['config']['static-mark.path.root'];
			
		$mapper = new PostMapper($this->app['fs'], new ArrayCollection, new Yaml);
		
		$mapper->setStoragePath(realpath($path));
		$this->createAdvertPayload($mapper->advert());
		$this->createCreatorPayload($mapper->creator());
		
		$path = $this->app['config']['static-mark.path.post'];
		$mapper->map($path);
			
		return $mapper;
	}

	/**
	 * Create post creator payload
	 * 
	 * @param \StaticMark\Services\Mapper\Payload\PostMapper
	 *  
	 * @return void
	 */	
	private function createCreatorPayload(PostCreator $creator)
	{
		$username = $this->app['config']['static-mark.creator.username'];
		$imagePath = $this->app['config']['static-mark.creator.image.path'];
		$about = $this->app['config']['static-mark.creator.about'];
		$url = $this->app['config']['static-mark.creator.url'];
		
		$creator->setUsername($username);
		$creator->setDefaultImagePath($imagePath);
		$creator->setAbout($about);
		$creator->setWebsiteUrl($url);
	}

	/**
	 * Create post advertisement payload
	 * 
	 * @param \StaticMark\Services\Mapper\Payload\Advert
	 *  
	 * @return void
	 */	
	private function createAdvertPayload(Advert $advert)
	{
		$cta = $this->app['config']['static-mark.advert.cta'];
		$title = $this->app['config']['static-mark.advert.title'];
		$contact = $this->app['config']['static-mark.advert.contact'];
		$imagePath = $this->app['config']['static-mark.advert.image.path'];
		$description = $this->app['config']['static-mark.advert.description'];
		
		$advert->setTitle($title);
		$advert->setContact($contact);
		$advert->setCallToAction($cta);
		$advert->setImagePath($imagePath);
		$advert->setDescription($description);
	}

	/**
	 * Get default post advertisement payload
	 * 
	 * @return array
	 */	
	public function createDefaultAdvertPayload()
	{
		$advert = new Advert(new ArrayCollection);
		$this->createAdvertPayload($advert);
		
		$advert->map(array());
		return $advert->getArrayCollection();
	}
}