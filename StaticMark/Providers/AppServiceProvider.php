<?php
namespace StaticMark\Providers;

use StaticMark\Services\View\View;
use Repository\Component\Config\Config;
use Repository\Component\Cache\FileStore;
use Repository\Component\Cache\Repository;
use StaticMark\Services\Mapper\PostMapper;
use StaticMark\Persistence\PostRepository;
use StaticMark\Persistence\UserRepository;
use StaticMark\Services\Mark\MarkdownParser;
use Repository\Component\Support\ServiceProvider;
use StaticMark\Domain\Repository\RepositoryInterface;
use StaticMark\Services\Mapper\Factory\MapperFactory;
use StaticMark\Services\Mapper\Contracts\MapperInterface;
use Repository\Component\Auth\User\Repository\UserRepository as IUserRepository;

/**
 * Application Service Provider.
 *
 * @package	  \StaticMark
 * @author    Hariyanto - harrieanto31@yahoo.com
 * @version   1.0
 * @link      https://www.bandd.web.id
 * @copyright Copyright (C) 2019 Hariyanto
 * @license   https://github.com/harrieanto/StaticMark/blob/master/LICENSE.md
 */
class AppServiceProvider extends ServiceProvider
{
	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * {@inheritdoc}
	 * See \Repository\Component\Support\ServiceProvider::boot()
	 */
	public function boot()
	{
		$dir = __DIR__.DS.'..'.DS.'Route';
		$api = $dir.DS.'Api';
		$web = $dir.DS.'Web';
		$middleware = $dir.DS.'Middleware';
		
		$this->app['route']->addPath($api, 'api.php');
		$this->app['route']->addPath($web, 'web.php');
		$this->app['route']->addPath($middleware, 'middleware.php');
	}

	/**
	 * {@inheritdoc}
	 * See \Repository\Component\Support\ServiceProvider::register()
	 */
	public function register()
	{
		$this->registerConfig();
		$this->registerView();
		$this->registerCustomCache();
		$this->registerStaticPostMapper();
		$this->registerUserRepository();
		$this->registerStaticPostRepository();
	}

	/**
	 * Register View service to the container application
	 * 
	 * @return void
	 */	
	private function registerView(): void
	{
		$this->app->singleton(View::class, function ($app) {
			$view = new View($app['fs'], $app['view.compiler']);
			$view->registerApp($app);
			$view->registerShared();
			
			return $view;
		});
	}

	/**
	 * Register concrete user repository by their contract to the container application
	 * 
	 * @return void
	 */	
	private function registerUserRepository(): void
	{
		$this->app->bind(IUserRepository::class, function($app) {
			return new UserRepository();
		});
	}

	/**
	 * Register concrete static post repository by their contract to the container application
	 * 
	 * @return void
	 */
	private function registerStaticPostRepository(): void
	{
		$this->app->singleton(RepositoryInterface::class, function ($app) {
			$repository = new PostRepository(new MarkdownParser, $app['static.mark.cache'], $app[MapperInterface::class]);
			$repository->persist();
			
			return $repository;
		});
	}

	/**
	 * Register static mark configuration
	 * 
	 * @return void
	 */
	private function registerConfig(): void
	{
		$path = realpath(__DIR__.DS.'..'.DS.'Config');
		$path = $path.DS.'static-mark.php';
		
		Config::set('static-mark',  require_once $path);
	}

	/**
	 * Register post mapper to the container application
	 * 
	 * @return void
	 */	
	private function registerStaticPostMapper(): void
	{	
		$this->app->singleton(MapperFactory::class, function ($app) {
			$mapper = new MapperFactory($this->app);
			return $mapper;
		});
		
		$this->app->singleton(MapperInterface::class, function ($app) {
			return $app[MapperFactory::class]->create();
		});
	}

	/**
	 * Register custom cache repository
	 * 
	 * @return void
	 */
	private function registerCustomCache(): void
	{
		$this->app->singleton('static.mark.cache', function ($app) {
			$path = $app['config']['static-mark.path.output'];
			$storage = $app['config']['static-mark.path.root'];
			$storage = $storage . DIRECTORY_SEPARATOR . $path;
			$store = new FileStore($app['fs'], $storage, '');

			return new Repository($store);
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

	/**
	 * Get the events that trigger this service provider to register.
	 *
	 * @return array
	 */
	public function when()
	{
		return array();
	}

	/**
	 * Determine if the provider is deferred.
	 *
	 * @return bool
	 */
	public function isDeferred()
	{
		return $this->defer;
	}
}