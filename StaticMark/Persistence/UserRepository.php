<?php
namespace StaticMark\Persistence;

use StaticMark\Domain\Entity\User;
use StaticMark\Domain\Value\Password;
use Repository\Component\Auth\User\Repository\UserRepository as IUserRepository;

/**
 * User Repository.
 *
 * @package	  \StaticMark
 * @author    Hariyanto - harrieanto31@yahoo.com
 * @version   1.0
 * @link      https://www.bandd.web.id
 * @copyright Copyright (C) 2019 Hariyanto
 * @license   https://github.com/harrieanto/StaticMark/blob/master/LICENSE.md
 */
class UserRepository implements IUserRepository
{
	/**
	 * Get user by the given username
	 * 
	 * @param string $username
	 * 
	 * @return array
	 */
	public function getByUsername(string $username)
	{
		$entity = new User;
		
		if ($username === app_env('APP_USERNAME')) {
			$entity->setPassword(new Password(app_env('APP_PASSWORD')));
			return array($entity);
		}
	}
}