<?php
namespace StaticMark\Controllers\Dashboard;

use StaticMark\Services\View\View;
use App\Http\Controllers\Controller;
use StaticMark\Services\Meta\MetaGenerator;
use StaticMark\Domain\Repository\RepositoryInterface;
use StaticMark\Services\Mapper\Contracts\MapperInterface;
use Repository\Component\Contracts\Filesystem\FilesystemInterface;

/**
 * Abstract Dashboard Controller.
 *
 * @package	  \StaticMark
 * @author    Hariyanto - harrieanto31@yahoo.com
 * @version   1.0
 * @link      https://www.bandd.web.id
 * @copyright Copyright (C) 2019 Hariyanto
 * @license   https://github.com/harrieanto/StaticMark/blob/master/LICENSE.md
 */
abstract class AbstractController extends Controller
{
	/**
	 * @param \Repository\Component\Contracts\Filesystem\FilesystemInterface $fs
	 * @param \StaticMark\Services\Mapper\Contracts\MapperInterface $mapper
	 * @param \StaticMark\Domain\Repository\RepositoryInterface $repository
	 * @param \StaticMark\Services\View\View $view
	 */
	public function __construct(FilesystemInterface $fs, MapperInterface $mapper, RepositoryInterface $repository, View $view)
	{
		$this->fs = $fs;
		$this->mapper = $mapper;
		$this->repository = $repository;
		$this->view = $view;
	}
	
	/**
	 * Geerate html meta from array
	 * 
	 * @param array $metas
	 * 
	 * @return string
	 */
	protected function generateMetaFromArray(array $metas = array())
	{
		$meta = new MetaGenerator($metas);
		return $meta->getMetaAsRawString();
	}
}