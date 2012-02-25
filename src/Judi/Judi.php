<?php

namespace Judi;

use Symfony\Component\Yaml\Yaml;

class Judi
{
	public $command;
	public $class;
	public $option;
	public $method;
	public $params;
	public $argv;
	
	public function __construct()
	{
		$this->argv = $_SERVER['argv'];
	}

	public function run($config)
	{
		$array = Yaml::parse($config);
		print_r($array);
		if (array_key_exists($this->argv[1], $array)) {
			$this->command = $this->argv[1];
			$this->class = $this->getConfig('class', $array[$this->command]);
			$this->method = $this->getConfig('method', $array[$this->command]);
				
		} else {
			throw new \Exception("Command {$this->argv[1]}, dont exists.");
		}
			
	}	
	
	public function getConfig($arrayKey, $arrayValue)
	{
		if (array_key_exists('options', $arrayValue)) {
			if (array_key_exists($arrayKey, $arrayValue['options'])) {	
				return $arrayValue['options'][$arrayKey];
			} else {
				throw new \Exception('Invalid Configuration');
			}
		} else if (array_key_exists($arrayKey, $arrayValue)) {
			return $arrayValue[$arrayKey];
		} else {
			throw new \Exception('Invalid Configuration');
		}
	}
	
	public function isCommand($command, $input)
	{
		return preg_match("/^\s*($command)\s*$/i", $input) ? true : false;
	}
	
	public function __destruct()
	{
		print_r($this->command);
	}
	
}