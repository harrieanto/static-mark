<?php
namespace StaticMark\Services\Mapper;

use DateTime;
use StaticMark\Services\Mark\Head;
use Repository\Component\Support\Str;
use StaticMark\Services\Mapper\Payload\Advert;
use StaticMark\Services\Mapper\Payload\PostCreator;
use StaticMark\Services\Mapper\Contracts\YamlInterface;
use StaticMark\Services\Mapper\Contracts\MapperInterface;
use StaticMark\Services\Mapper\Contracts\CollectionInterface;
use Repository\Component\Contracts\Filesystem\FilesystemInterface;

/**
 * File Blog Post Mapper.
 *
 * @package	  \StaticMark
 * @author    Hariyanto - harrieanto31@yahoo.com
 * @version   1.0
 * @link      https://www.bandd.web.id
 * @copyright Copyright (C) 2019 Hariyanto
 * @license   https://github.com/harrieanto/StaticMark/blob/master/LICENSE.md
 */
class PostMapper implements MapperInterface
{
	/**
	 * The default expired time when the post shouldn't remapped
	 * @var int
	 */
	const EXPIRED_IN_MINUTE = 1200;
	
	/**
	 * The Filesystem instance
	 * @var \Repository\Component\Contracts\Filesystem\FilesystemInterface $fs
	 */	
	private $fs;

	/**
	 * The YAML instance
	 * @var \StaticMark\Services\Mapper\Contracts\YamlInterface $yaml
	 */	
	private $yaml;

	/**
	 * The post file storage
	 * @var string $storage
	 */	
	private $storage;
	
	/**
	 * THe default post mapper file
	 * @var string $fileMapper
	 */	
	private $fileMapper = 'map.php';
	
	/**
	 * The array collection interface
	 * @var \StaticMark\Services\Mapper\Contracts\CollectionInterface
	 */
	private $collection;

	/**
	 * @param \Repository\Component\Contracts\Filesystem\FilesystemInterface $fs
	 * @param \StaticMark\Services\Mapper\Contracts\YamlInterface $yaml
	 * @param \StaticMark\Services\Mapper\Contracts\CollectionInterface $collection
	 */	
	public function __construct(FilesystemInterface $fs, CollectionInterface $collection, YamlInterface $yaml)
	{
		$this->fs = $fs;
		$this->yaml = $yaml;
		$this->collection = $collection;
	}
	
	/**
	 * @{inheritdoc}
	 * See \StaticMark\Services\Contracts\MapperInterface::map()
	 */
	public function map($directory, $force = false)
	{
		$directory = trim($directory, DIRECTORY_SEPARATOR);
		$directories = glob($this->storage.DIRECTORY_SEPARATOR.$directory.'/*');
		$mapper = $this->storage.DIRECTORY_SEPARATOR.$this->fileMapper;
		$mappers = array();
				
		foreach ($directories as $path) {
			if (file_exists($path) && $this->shouldRemap($path, true)) {
				$maps = $this->loadPostFileMapper($path);
				$this->setSlugFromMdText(file_get_contents($path), $this->fs->name($path));
				$this->addCreatedAt($path, $maps);
				$this->addPathFile($path);
				$this->creator->map($maps);
				$this->advert->map($maps);
				$this->addMeta($maps);
				$this->addTag($maps);
				$mappers[$path] = $this->collection->all();
			}
		}
		
		$previous = $this->refreshFileMapper();
		$mappers = array_merge($previous, $mappers);
		$this->fs->saveArrayToFile($mapper, $mappers);
	}

	/**
	 * Refresh file mapper
	 * 
	 * @return void
	 */
	private function refreshFileMapper()
	{
		$mappers = $this->getMappers();
		
		foreach (array_keys($this->getMappers()) as $path) {
			if (!file_exists($path)) {
				unset($mappers[$path]);
			}
		}
		
		return $mappers;
	}

	/**
	 * Load post mappper from their defined yaml meta
	 * 
	 * @param string $path
	 * 
	 * @return array
	 */	
	public function loadPostFileMapper($path)
	{
		$path = file_get_contents($path);
		$mappers = array();
		
		if (preg_match("/-{3}(.+)-{3}/sm", $path, $matches)) {
			$match = trim(implode((array) end($matches)));
			$mappers = (array) $this->yaml->parse($match);
		}
		
		return $mappers;
	}
		
	public function advert()
	{
		$this->advert = new Advert($this->collection);
		
		return $this->advert;
	}
	
	public function creator()
	{
		$this->creator = new PostCreator($this->collection);
		
		return $this->creator;
	}

	/**
	 * Add created ad post mapper
	 * 
	 * @param string $path
	 * @param array $mappers
	 * 
	 * @return void
	 */
	private function addCreatedAt(string $path, array $mappers)
	{
		$createdAt = date('M j, Y', filemtime($path));		
		$this->collection->add('created_at', $createdAt);
		
		if (isset($mappers['created_at'])) {
			$this->collection->add('created_at', $mappers['created']);
		}		
	}

	/**
	 * Set storage where the post should be place in
	 * 
	 * @param string $path
	 * 
	 * @return void
	 */	
	public function setStoragePath(string $path)
	{
		$this->storage = $path;
	}

	/**
	 * Get storage where the post placed in
	 * 
	 * @return string
	 */	
	public function getStoragePath()
	{
		return $this->storage;
	}

	/**
	 * Add post meta by the given post mappers
	 * 
	 * @param array $mappers
	 * 
	 * @return void
	 */	
	private function addMeta(array $mappers)
	{
		$this->collection->add('meta', array());
		
		if (isset($mappers['meta'])) {
			$this->collection->add('meta', $mappers['meta']);
		}
	}
	
	/**
	 * Add post tag by the given mappers
	 * 
	 * @param array $mappers
	 * 
	 * @return void
	 */
	private function addTag(array $mappers)
	{
		$this->collection->add('tag', array());
		
		if (isset($mappers['tag'])) {
			$tags = array();
			
			foreach ((array) $mappers['tag'] as $tag) {
				$slug = Str::slug($tag);
				$tags[$slug] = $tag;
			}
			
			$this->collection->add('tag', $tags);
		}
	}
	
	/**
	 * Set post slug by the given markdown text
	 * This method will seeking first geading of the given markdown text and set it up as post slug
	 * 
	 * @param string $text
	 * @param string $default The default text for slug
	 * 
	 * @return void
	 */
	private function setSlugFromMdText(string $text, string $default)
	{
		$slug = Str::slug($default);
		$head = Head::createFromText($text);
		
		if (($heading = $head->getHeaderLine()) !== false) {
			$slug = Str::slug($heading);
		}
		
		$this->collection->add('slug', $slug);
	}
	
	/**
	 * Add path file to the mapper
	 * 
	 * @param string $path The path to post file
	 * 
	 * @return void
	 */
	private function addPathFile($path)
	{
		$this->collection->add('pathfile', $path);
	}

	/**
	 * Get post mappers
	 * 
	 * @return array
	 */	
	public function getMappers()
	{
		$mapper = $this->storage.DIRECTORY_SEPARATOR.$this->fileMapper;
		
		if ($this->fs->exists($mapper)) {
			$mappers = require $mapper;
			return is_array($mappers) ? $mappers : array();
		}
	}

	/**
	 * Determine if the post file should be remap
	 * 
	 * @param string $path The path to post file
	 * @param bool $force Determine if the post file have to force remaped
	 * 
	 * @return bool
	 */	
	public function shouldRemap(string $path, $force = false)
	{
		if ($force) return true;
		
		$current = new DateTime;
		$modificationTime = $current->getTimestamp()-filemtime($path);
		
		if ($modificationTime < PostMapper::EXPIRED_IN_MINUTE) {
			return true;
		}
		
		return false;
	}
}