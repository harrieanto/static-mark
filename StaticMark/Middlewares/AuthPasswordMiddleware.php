<?php
namespace StaticMark\Middlewares;

use Closure;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Repository\Component\Http\Response;
use Repository\Component\Auth\Credential;
use Repository\Component\Auth\CredentialTypes;
use Repository\Component\Auth\UsernamePasswordAuth;
use Repository\Component\Support\Statics\ResponseRedirect;
use Repository\Component\Auth\User\Repository\UserRepository;
use Repository\Component\Contracts\Container\ContainerInterface;
use Repository\Component\Contracts\Http\Middleware\MiddlewareInterface as IMiddleware;

/**
 * Auth Password Middleware.
 *
 * @package	  \StaticMark
 * @author    Hariyanto - harrieanto31@yahoo.com
 * @version   1.0
 * @link      https://www.bandd.web.id
 * @copyright Copyright (C) 2019 Hariyanto
 * @license   https://github.com/harrieanto/StaticMark/blob/master/LICENSE.md
 */
class AuthPasswordMiddleware implements IMiddleware
{
	/**
	 * @param \StaticMark\Services\Mapper\Contracts\CollectionInterface
	 */	
	public function __construct(ContainerInterface $app)
	{
		$this->app = $app;
	}
	
	/**
	 * @param \Psr\Http\Message\RequestInterface $request
	 * @param \Closure $next
	 */
	public function handle(RequestInterface $request, Closure $next):? ResponseInterface
	{
		$error = '';

		$auth = new UsernamePasswordAuth($this->app[UserRepository::class], $this->app['hash']);

		$credential = new Credential(CredentialTypes::USERNAME_PASSWORD, (array) $request->getParsedBody());
		
		if (!$auth->authenticate($credential, $error)) {
			ResponseRedirect::back('flash', $error);
			
			return new Response;
		}
		
		$this->app['session']->set('signed_credential', $credential->getValue('username'));
		
		$signed = $this->app['session']->get('signed_credential');
		
		ResponseRedirect::make('dashboard/post')->with('flash', "Welcome $signed");
		
		return new Response();
	}
}