<?php
namespace StaticMark\Controllers\Dashboard;

use Repository\Component\Support\Statics\ResponseRedirect;

/**
 * Delete Controller.
 *
 * @package	  \StaticMark
 * @author    Hariyanto - harrieanto31@yahoo.com
 * @version   1.0
 * @link      https://www.bandd.web.id
 * @copyright Copyright (C) 2019 Hariyanto
 * @license   https://github.com/harrieanto/StaticMark/blob/master/LICENSE.md
 */
class DeleteController extends AbstractController
{
	/**
	 * Delete blog post by the given slug
	 * 
	 * @param string $slug
	 * 
	 * @return void|null
	 */
	public function index($slug)
	{
		$post = $this->repository->getBySlug($slug);
		$pathToFile = $post->get(0)['pathfile'];
		
		if (empty($post->all())) {
			ResponseRedirect::back('flash', "Failed to delete post [$slug]");
			return;
		}
		
		$this->repository->deleteBySlug($slug);
		
		ResponseRedirect::back('flash', "Post with slug [$slug] was succesful deleted.");
	}
}