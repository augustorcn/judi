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
		$explode = new Explode(Yaml::parse($config));
		$this->setCommand($explode->commands());
		$this->setClass($explode->configuration()->classes());
		$this->setOptions($explode->configuration()->options());
		$this->setParams($explode->configuration()->params());
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
		$this->class = $class;
	}
	
	public function setOptions($oprions = null)
	{
		$this->options = $oprions;
	}
	
	public function setParams($params = null)
	{
		$this->params = $params;
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