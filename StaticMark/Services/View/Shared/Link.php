<?php
namespace StaticMark\Services\View\Shared;

use Repository\Component\Config\Config;
use Repository\Component\Support\Facades\Html;
use StaticMark\Services\Mapper\Factory\MapperFactory;
use Repository\Component\View\ViewShared as AbstractViewShared;

/**
 * Link Shared Variable.
 *
 * @package	  \StaticMark
 * @author    Hariyanto - harrieanto31@yahoo.com
 * @version   1.0
 * @link      https://www.bandd.web.id
 * @copyright Copyright (C) 2019 Hariyanto
 * @license   https://github.com/harrieanto/StaticMark/blob/master/LICENSE.md
 */
class Link extends AbstractViewShared
{
	/**
	 * Register shared variables to the view handler
	 * 
	 * @return void
	 */	
	public function registerSharedVariable()
	{
		$shareds = array(
			'postedBy' => 'Posted by', 
			'contentNotFound' => 'The content you\'re looking for unavailable', 
			'title' => 'Blog | Hariyanto', 
			'currentPages' => 'Blog', 
			'waNumber' => $this->getWaNUmber(), 
			'waNumberOrderFormat' => $this->getWaNumberOrderFormat(), 
			'advert' => $this->createDefaultAdvert(), 
			'adminMenus' => $this->getAdminMenus(), 
			'defaultMenus' => $this->getDefaultMenus(), 
			'isLogged' => $this->isLogged(), 
			'appSubName' => '', 
			'meta' => '', 
		);

		$this->view->withShared(array_keys($shareds), $shareds);
	}
	
	/**
	 * Determine if the user is logged
	 * 
	 * @return bool
	 */
	private function isLogged()
	{
		return $this->app['session']->has('signed_credential');
	}

	/**
	 * Get default menu navigations
	 * 
	 * @return array
	 */	
	private function getDefaultMenus()
	{
		return Config::get('static-mark.navigation.default');
	}

	/**
	 * Get default admin menu navigations
	 * 
	 * @return array
	 */
	private function getAdminMenus()
	{
		return Config::get('static-mark.navigation.admin');
	}

	/**
	 * Create default advertisement
	 * 
	 * @return array
	 */	
	private function createDefaultAdvert()
	{
		$mapper = $this->app[MapperFactory::class];
		
		return $mapper->createDefaultAdvertPayload()->all();
	}

	/**
	 * Get default contact number
	 * 
	 * @return string
	 */	
	private function getWaNumber()
	{
		$number = app_env('WHATSAPP_API_HOST') . DS . app_env('APP_CONTACT');
		
		return $number;
	}

	/**
	 * Get default number order format
	 * 
	 * @return string
	 */
	private function getWaNumberOrderFormat()
	{
		$env = $this->app['env'];
		$host = $env['WHATSAPP_API_HOST'];
		$number = $env['APP_CONTACT'];
		$queryMessage = 'text=';
		$queryMessage.= "Assalamualaikum...\n";
		$queryMessage.= "Saya berkunjung ke-website bandd.web.id ";
		$queryMessage.= "Dan saya ingin memesan e-book 'The Home Green PHP Aplikasi Framework'";

		$builder = $this->app['uri']
			->withHost($host)
			->withPath($number)
			->withQuery($queryMessage);
		
		return $builder->getUri();
	}
}
