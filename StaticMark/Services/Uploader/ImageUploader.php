<?php
namespace StaticMark\Services\Uploader;

use Psr\Http\Message\UriInterface;
use Repository\Component\Config\Config;
use Repository\Component\Support\Image;
use Repository\Component\Http\JsonResponse;
use Repository\Component\Validation\Validation;
use Repository\Component\Contracts\Container\ContainerInterface;

/**
 * Image Uploader Handler.
 *
 * @package	  \StaticMark
 * @author    Hariyanto - harrieanto31@yahoo.com
 * @version   1.0
 * @link      https://www.bandd.web.id
 * @copyright Copyright (C) 2019 Hariyanto
 * @license   https://github.com/harrieanto/StaticMark/blob/master/LICENSE.md
 */
class ImageUploader
{
	/**
	 * The application instance
	 * @var \Repository\Component\Contracts\Container\ContainerInterface $app
	 */
	private $app;

	/**
	 * The uploaded target directory
	 * @var string $uploadedTarget
	 */
	private $uploadedTarget;

	/**
	 * The uri instance
	 * @var \Psr\Http\Message\UriInterface $uri
	 */	
	private $uri;
	
	/**
	 * @param \Repository\Component\Contracts\Container\ContainerInterfacce
	 */	
	public function __construct(ContainerInterface $app)
	{
		$this->app = $app;
	}
	
	/**
	 * Set uploaded target directory
	 * 
	 * @param string $target The target directory
	 * 
	 * @return void
	 */
	public function setDirectory($target)
	{
		if (!$this->app['fs']->isDirectory($target))
			throw new \Exception('The given directory is not directory');
		
		$this->uploadedTarget = $target;
	}
	
	public function getDirectory()
	{
		$directory = $this->uploadedTarget;
		
		if ($directory === null) {
			$directory = Config::get('static-mark')['uploaded_path'];
		}
		
		$directory = rtrim($directory, DS);

		return $directory;
	}
	
	/**
	 * Set uploaded host
	 * 
	 * @param \Psr\Http\Message\UriInterface $uri
	 * 
	 * @return \Medium\Style\Services\EditorJsUploader
	 */	
	public function setUploadedHost(UriInterface $uri)
	{
		$this->uri = $uri->getUri();

		return $this;
	}
	
	public function getUploadedHost()
	{
		$host = $this->uri;
		
		if ($host === null)
			$host = Config::get('medium-style')['uploaded_host'];
		
		$host = rtrim($host, DS);

		return $host;
	}

	/**
	 * @param \Repository\Component\Validation\Validation $validation
	 * @param \Repository\Component\Http\JsonResponse
	 * @param \Repository\Component\Support\Image
	 * 
	 * @return \Psr\Http\Message\ResponseInterface
	 */
	public function handle(
		Validation $validation, 
		JsonResponse $response, 
		Image $image)
	{
		//Set default uploaded directory
		$validation->setUploadedTarget($this->getDirectory());
		//Create validation map
		//The validation class will be handle everything that we needs
		//to upload almost any file
		$validation->make(array(
			'attachment' => 'required', 
		));

		//Build fresh image source of uploaded file
		$uploadedFile = trim($validation->getUploadedFileNames()[0], DS);
		$uploadedFileHost = trim($this->getUploadedHost(), DS);
		$uploadedFileHost = $uploadedFileHost.DS.$uploadedFile;
		$uploadedFilePath = $this->getDirectory().DS.$uploadedFile;

		if (!$validation->isValidated()) {
			//Unsupported media type
			$response->withStatus(415);
			$uploaded = $validation->alerts();
			$response->withBody($uploaded);

			return $response;
		}
		
		//Here, we want tweak some functionality to resize(increase/decrease) image quality
		//So any image quality uploaded by user will be increase or decrease
		//depends on uploaded image state
		$image->setImage($uploadedFilePath);
		$image->setDirectory($this->getDirectory());
		//Here we will resize image at 50% depends on uuploaded image state
		if ($image->resizeQuality(50)) {
			$uploadedFileHost = trim($this->getUploadedHost(), DS);
			$uploadedFileHost = $uploadedFileHost.DS.$image->getReimageFile();
			$uploadedFilePath = $this->getDirectory().DS.$image->getReimageFile();
			//Here we will remove uploaded file before when image have succesfully resized
			$image->remove();
		}

		$response->withBody($uploaded);
		
		return $response;
	}
}