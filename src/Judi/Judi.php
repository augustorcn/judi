<?php

namespace Judi;

use Symfony\Component\Yaml\Yaml;

class Judi
{
	private $command = array();
	private $options = array();
	private $params = array(); 
	private $class;
	
	public function __construct($config)
	{
		$proceduresData = $this->explodeProcedures(Yaml::parse($config));
	}
	
	private function explodeProcedures($yamlToArray)
	{
		if (!array_key_exists('Commands', $yamlToArray))
			throw new \Exception("You need to set the key 'Commands'.");
		foreach ($yamlToArray as $commands) {
			if (!isset($commands))
				throw new \Exception('You need to set a command.');
			$this->explodeCommands($commands);
		}
	}
	
	private function explodeCommands($commands)
	{
		foreach ($commands as $command => $data) {
			if (!isset($data))
				throw new \Exception('You need to set a command configuration.');
			if (!array_key_exists('class', $data))
				throw new \Exception('You need to set the command class.');
			
			$this->setCommand($command);
			$this->explodeData($data);
		}
	}
	
	private function explodeData($data)
	{
		foreach ($data as $key => $value) {
			if ($key == 'class') {
				if (!isset($value))
					throw new \Exception('You need to set a valid class name.');
				$this->setClass($value);
			}
			if ($key == 'options') {
				$this->explodeOptions($value);
			}
		}
	}
	
	private function explodeOptions($options)
	{
		foreach ($options as $option => $params) {
			$this->setOptions($option);	
			if (is_array($params)) {
				if (array_key_exists('params', $params))
					$this->explodeParams($params);
			} else {
				$this->setParams(null);
			}		
		}
	}
	
	private function explodeParams($params)
	{
		foreach ($params as $param)
			foreach ($param as $name => $type) {
				if (!isset($type))
					throw new \Exception("You need to set a type to param {$name}");
				$this->setParams($name);
			}
	}
	
	public function run()
	{
	}
	
	public function setCommand($command)
	{
		$this->command = $command;
	}
	
	public function setClass($class)
	{
		$this->class[$this->command][] = $class;
	}
	
	public function setOptions($oprions = null)
	{
		$this->options[$this->command][] = $oprions;
	}
	
	public function setParams($params = null)
	{
		$this->params[$this->command][] = $params;
	}
	
	public function getCommand()
	{
		return $this->command;
	}
	
	public function getClass()
	{
		return $this->class[$this->command];
	}
	
	public function getOptions()
	{
		return $this->options;
	}
	
	public function getParams()
	{
		return $this->params[$this->command];
	}
	
}