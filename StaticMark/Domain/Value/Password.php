<?php
namespace StaticMark\Domain\Value;

/**
 * Password Value Object.
 *
 * @package	  \StaticMark
 * @author    Hariyanto - harrieanto31@yahoo.com
 * @version   1.0
 * @link      https://www.bandd.web.id
 * @copyright Copyright (C) 2019 Hariyanto
 * @license   https://github.com/harrieanto/StaticMark/blob/master/LICENSE.md
 */
class Password
{
	/**
	 * @var string $password
	 */
	private $password;
	
	/**
	 * Hash the given password
	 * 
	 * @param string $password
	 */
	public function __construct($password)
	{
		$this->password = password_hash($password, PASSWORD_BCRYPT);
	}

	/**
	 * Get hashed password
	 * 
	 * @param string The hashed password
	 */	
	public function getPassword()
	{
		$password = $this->password;
		
		return $password;
	}
}