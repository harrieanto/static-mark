<?php
namespace StaticMark\Services\Mapper;

use Exception;
use Symfony\Component\Yaml\Yaml as SymfonyYaml;
use StaticMark\Services\Mapper\Contracts\YamlInterface;

/**
 * YAML Adapter.
 *
 * @package	  \StaticMark
 * @author    Hariyanto - harrieanto31@yahoo.com
 * @version   1.0
 * @link      https://www.bandd.web.id
 * @copyright Copyright (C) 2019 Hariyanto
 * @license   https://github.com/harrieanto/StaticMark/blob/master/LICENSE.md
 */
class Yaml implements YamlInterface
{
	/**
	 * @{inheritdoc}
	 * See StaticMark\Services\Mapper\Contracts\YamlInterface::parse()
	 */
	public function parse(string $path)
	{
		try {
			return SymfonyYaml::parse($path);
		} catch (Exception $e) {
			throw new YamlParserException(
				$e->getMessage(), $e->getCode(), $e
			);
		}
	}

	/**
	 * @{inheritdoc}
	 * See StaticMark\Services\Mapper\Contracts\YamlInterface::dump()
	 */
	public function dump($values)
	{
		try {
			SymfonyYaml::dump($values);
		} catch (Exception $e) {
			throw new YamlParserException(
				$e->getMessage(), $e->getCode(), $e
			);
		}
	}
}

class YamlParserException extends Exception
{
	public function __construct($message = "", $code = 0, $previous = NULL) {
		if (version_compare(PHP_VERSION, "5.3.0") < 0) {
			parent::__construct($message, $code);
		} else {
			parent::__construct($message, $code, $previous);
		}
	}
}