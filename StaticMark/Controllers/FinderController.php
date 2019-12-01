<?php
namespace StaticMark\Controllers;

use Repository\Component\Http\Uri;
use StaticMark\Services\View\View;
use Repository\Component\Support\Str;
use Repository\Component\Http\JsonResponse;
use Repository\Component\Collection\Collection;
use Repository\Component\Validation\Validation;
use StaticMark\Services\Mapper\PostMapperExtra;
use StaticMark\Domain\Repository\RepositoryInterface;

/**
 * Damn Simple Finder API Controller.
 *
 * @package	  \StaticMark
 * @author    Hariyanto - harrieanto31@yahoo.com
 * @version   1.0
 * @link      https://www.bandd.web.id
 * @copyright Copyright (C) 2019 Hariyanto
 * @license   https://github.com/harrieanto/StaticMark/blob/master/LICENSE.md
 */
class FinderController extends AbstractController
{	
	/**
	 * @param \Repository\Component\Validation\Validation $validation
	 * @param \Repository\Component\Http\JsonResponse $response
	 * @param int $currentPage
	 */
	public function find(Validation $validation, JsonResponse $response, int $currentPage)
	{
		$validation->make(array(
			'keyword' => 'required|letter', 
		));

		$errors = array(
			'error' =>  array(), 
			'custom_field_list' => array('Keyword'), 
			'success' => false
		);

		if (!$validation->isValidated()) {
			$errors['error'][] = $validation->alert('keyword');

			$response->withBody($errors);

			echo $response->toJson();
			
			return;
		}
		
		$payload = $this->getFoundKeyword($errors, $currentPage);

		if ($payload === null) {
			$response->withBody($errors);
			echo $response->toJson();
			return;
		}
		
		$errors['error'] = false;
		$errors['success'] = $payload->all();

		$response->withBody($errors);
		echo $response->toJson();
	}

	/**
	 * @param array &$errors
	 * @param int $currentPage
	 * 
	 * @return null When the looked keyword not found
	 * \Repository\Component\Colleection\Collection otherwise
	 */
	private function getFoundKeyword(&$errors = array(), int $currentPage)
	{
		$post = $this->repository->getAll();
		
		PostMapperExtra::injectHighlight($post);
		PostMapperExtra::injectHeaderLine($post);
		
		$pagination = $this->app['pagination'];
		$pagination->make($post);
		$pagination->setTotalItem($total = $post->count());
		$pagination->setUri($this->getFinderUriBy($currentPage));
		
		$this->createPaginationFromFinderItem($pagination);
		
		$pagination->setLimit(self::LIMIT_PER_PAGE);
		$pagination->paginate();

		if ($total === 0) {
			$ex = "Sorry, The keyword that you're looking not available.";

			$errors['error'] = array($ex);
			
			return null;
		}

		if ($pagination->getTotalItem() === 0) {
			$ex = "The keyword that you're looking for not found";

			$errors['error'] = array($ex);
			
			return null;
		}
		
		if (!$pagination->isAvailable()) {
			$errors['error'] = false;
			$errors['success']['payload'][] = array('page' => false);
			
			return null;
		}
		
		$payload = Collection::make(array());
		$payload->add('found', $pagination->getTotalItem());
		
		foreach ($pagination->getPageItems()->all() as $items) {
			$payloads[] = array(
				'heading' => $items['heading'], 
				'highlight' => $items['highlight'], 
				'slug' => route('blog.read', $items['slug']), 
				'page' => true
			);

			$payload->add('payload', $payloads);
		}
		
		return $payload;
	}
	
	/**
	 * Get requested/inputed user keyword
	 * 
	 * @return array|null|string
	 */
	private function getRequestedKeyword()
	{
		$keywords = $this->app['request']->getInputSource('keyword');
		
		return $keywords['keyword'];
	}
	
	private function createPaginationFromFinderItem($pagination)
	{
		$finder = $pagination->getFinder();
		$itemFound = $finder->findInAllPageBy($this
			->getRequestedKeyword(), 'post'
		);
		
		$pagination->make($itemFound);
		$pagination->setTotalItem($itemFound->count());
	}
	
	private function createFinderCallback()
	{
		return function ($collection) {
			$collection->map(function ($items) use (&$found, $collection) {
				$found[] = $items['post'];
			});
			
			return Collection::make($found);
		};
	}
	
	/**
	 * Get finder uri by the given page
	 * 
	 * @return \Psr\Http\Message\UriInterface
	 */
	private function getFinderUriBy($page)
	{
		return new Uri(route('blog.page', $page));
	}
}