<?php
namespace StaticMark\Domain\Entity;

use StaticMark\Domain\Value\Password;
use Repository\Component\Auth\User\UserEntityInterface;

/**
 * @Entity
 * @table(name="user")
 */
class User implements UserEntityInterface
{
	/**
	 * @Column(type="string")
	 */
	protected $password;

	/**
	 * @param \StaticMark\Domain\Value\Password
	 * 
	 * @return \StaticMark\Domain\Entity\User
	 */	
	public function setPassword(Password $password)
	{
		$this->password = $password->getPassword();

		return $this;
	}
	
	/**
	 * @return string The hashed password
	 */
	public function getHashedPassword()
	{
		return $this->password;
	}
}