<?php
namespace StaticMark\Controllers\Dashboard\Upload;

use Repository\Component\Config\Config;
use Repository\Component\Validation\Validation;
use Repository\Component\Support\Statics\ResponseRedirect;

/**
 * Handle Blog Post Upload Controller.
 *
 * @package	  \StaticMark
 * @author    Hariyanto - harrieanto31@yahoo.com
 * @version   1.0
 * @link      https://www.bandd.web.id
 * @copyright Copyright (C) 2019 Hariyanto
 * @license   https://github.com/harrieanto/StaticMark/blob/master/LICENSE.md
 */
class PostMarkdown extends AbstractController
{
	/**
	 * Handle post upload in markdown format
	 * 
	 * @param \Repository\Component\Validation\Validation $validation
	 * 
	 * @return void|null
	 */
	public function index(Validation $validation)
	{
		$target = Config::get('static-mark.path.root');
		$target = $target . DS . Config::get('static-mark.path.post');
		
		$uploadedFile = $validation->getUploadedFileInstance();
		$uploadedFile->setTarget($target);
		$uploadedFile->setRandomize(false);
		$uploadedFile->flushAllowedFileType();
		$uploadedFile->addAllowedFileType('md', 'text/markdown');
		//I don't have a solution and the answer of the reason
		//Why markdown file recognized as octet-stream when uploaded from mobile phone
		//So here the hack
		$uploadedFile->addAllowedFileType('mdk', 'application/octet-stream');
		
		$validation->make(array(
			'attachment' => 'required'
		));
		
		if (!$validation->isValidated()) {
			ResponseRedirect::back('flash', $validation->alert('attachment'));
			return;
		}
		
		$uploaded = $validation->getUploadedFilenames()[0];
		$message = "Markdown post succesfully uploaded with name [$uploaded]";
		
		ResponseRedirect::back('flash', $message);
	}
}
