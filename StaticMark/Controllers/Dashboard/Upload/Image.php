<?php
namespace StaticMark\Controllers\Dashboard\Upload;

use Repository\Component\Config\Config;
use Repository\Component\Validation\Validation;
use Repository\Component\Support\Statics\ResponseRedirect;

/**
 * Handle Image Upload Controller.
 *
 * @package	  \StaticMark
 * @author    Hariyanto - harrieanto31@yahoo.com
 * @version   1.0
 * @link      https://www.bandd.web.id
 * @copyright Copyright (C) 2019 Hariyanto
 * @license   https://github.com/harrieanto/StaticMark/blob/master/LICENSE.md
 */
class Image extends AbstractController
{
	/**
	 * Handle image upload
	 * 
	 * @param \Repository\Component\Validation\Validation $validation
	 * 
	 * @return void|null
	 */
	public function index(Validation $validation)
	{
		$target = app_config('static-mark')['uploader']['path'];
		
		$uploadedFile = $validation->getUploadedFileInstance();
		$uploadedFile->setTarget($target);
		$uploadedFile->setRandomize(false);
		
		$validation->make(array(
			'attachment' => 'required'
		));
		
		if (!$validation->isValidated()) {
			ResponseRedirect::back('flash', $validation->alert('attachment'));
			return;
		}
		
		$uploaded = $validation->getUploadedFilenames()[0];
		$message = "Image succesfully uploaded with name [$uploaded]";
		
		ResponseRedirect::back('flash', $message);
	}
}