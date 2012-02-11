<?php

namespace Judi;

use Symfony\Component\Yaml\Yaml;

class Judi
{
	private $command = array();
	private $options = array();
	private $params = array(); 
	
	public function __construct($config)
	{
		$array = Yaml::parse($config);
		print_r($array);
	}
	
	public function setProcedure($method, Array $name, Array $params = null)
	{
		$this->setCommand($name, $method);
		$this->setOptions($name);
		$this->setParams($params);
		return $this;
	}
	
	public function run()
	{
		print_r($this->command);
	}
	
	public function setCommand($name, $method)
	{
		$this->command[$name[0]][] = $method;
	}
	
	public function setOptions($oprions = null)
	{
		if (isset($oprions[1]))
			$this->options = $oprions[1];
	}
	
	public function setParams(Array $params = null)
	{
		if (isset($params))
			return $this->params = $params;
	}
	
	public function getCommand()
	{
		return $this->command;
	}
	
	public function getOptions()
	{
		return $this->options;
	}
	
	public function getParams()
	{
		return $this->params;
	}
	
}