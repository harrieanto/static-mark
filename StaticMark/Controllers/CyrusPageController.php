<?php
namespace StaticMark\Controllers;

use StaticMark\Services\Meta\MetaGenerator;

/**
 * Cyrus Static Page Controller.
 *
 * @package	  \StaticMark
 * @author    Hariyanto - harrieanto31@yahoo.com
 * @version   1.0
 * @link      https://www.bandd.web.id
 * @copyright Copyright (C) 2019 Hariyanto
 * @license   https://github.com/harrieanto/StaticMark/blob/master/LICENSE.md
 */
class CyrusPageController extends AbstractController
{
	/**
	 * Render to the cyrus ui
	 * 
	 * @return void
	 */
	public function index()
	{
		$title = 'Sabun Muka Premium dari Bahan Alami Cyrus Collagen Soap';
		$description = 'CYRUS Facial Soap di buat dengan desain premium serta mengandung bahan herbal terbaik untuk memutihkan dan mengembalikan sel kulit mati';
		
		app_env('APP_NAME', 'Sabun Muka Cyrus');
		app_env('APP_HOST', route('cyrus'));
		
		$metas = array(
			'title' => $title, 
			'name' => array(
			  'description' => $description, 
			  'twitter:card' => 'summary', 
			  'twitter:site' => app_env('CYRUS_TWITTER'), 
			  'twitter:title' => $title, 
			  'twitter:description' => $description, 
			  'twitter:creator' => app_env('CYRUS_TWITTER'), 
			  'twitter:image' => app_env('APP_HOST') . '/public/images/cyrus/cyrus_potrait_2.jpg', 
			), 
			'property' => array(
			  'og:title' => $title, 
			  'og:type' => 'article', 
			  'og:url' => app_env('APP_HOST'), 
			  'og:image' => app_env('APP_HOST') . '/public/images/cyrus/cyrus_potrait_2.jpg', 
			  'og:site_name' => app_env('APP_NAME'), 
			  'og:description' => $description
			), 
		);
		
		$meta = new MetaGenerator($metas);
		$meta = $meta->getMetaAsRawString();
		
		$this->renderContact();
		$this->view->withShared('meta', $meta);
		$this->view->to('cyrus/index');
	}
	
	/**
	 * Render/share cyrus contact to the shared view
	 * So we can just use this method when we need cyrus contact a.k.a reusable
	 * 
	 * @return void
	 */
	private function renderContact()
	{
		$message = "Assalamualaikum..\nSaya ingin memesan CYRUS FACIAL SOAP";
		$message = rawurlencode($message);
		
		$contact = app_env('WHATSAPP_API_HOST') . DS . app_env('CYRUS_CONTACT') . DS . $message;
		$this->view->withShared('contact', $contact);
	}
}