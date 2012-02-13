<?php

namespace Judi;

class Explode
{
	public $commandsToArray = array();
	public $configurationsToArray = array();
	public $currentClassToArray = array();
	public $currentOptionToArray = array();
	public $currentParamToArray = array();
	
	public function __construct(Array $yamlToArray)
	{
		foreach ($yamlToArray as $commands)
			$this->commandsToArray[] = $commands;
	}
	
	public function commands()
	{
		$commandName = array();
		foreach ($this->commandsToArray as $commands)
			foreach ($commands as $name => $configurations) {
				$commandName[] = $name;
				$this->configurationsToArray[$name] = $configurations;
			}
		return $commandName;
	}

	public function configuration()
	{
		foreach ($this->configurationsToArray as $command => $configurations)
			foreach ($configurations as $name => $value) {
				switch ($name) {
					case 'class':
						$this->currentClassToArray[$command] = $value;
						break;
					case 'options':
						$this->currentOptionToArray[$command] = $value;
						break;
					case 'params':
						$this->currentParamToArray[$command] = $value;						
						break;
					default:
						throw new \Exception("Invalid Option {$name}.");
						break;
				}
			}
			return $this;
	}
	
	public function classes()
	{
		$className = array();
		foreach ($this->currentClassToArray as $command => $value)
			$className[$command] = $value;
		return $className;
	}
	
	public function options()
	{
		$optionName = array();
		foreach ($this->currentOptionToArray as $command => $options)
			foreach ($options as $name => $value) {
				$optionName[$command] = $name;
				if (isset($value) && is_array($value))
					$this->currentParamToArray[$command][$name] = $value;
			}
		return $optionName;
	}
	
	public function params()
	{
		$paramsName = array();
		foreach ($this->currentParamToArray as $command => $value)
			if (isset($this->currentOptionToArray[$command]))
				foreach ($value as $option => $param)
					foreach ($param as $name => $type)
						$paramsName[$command][$option] = $name;
			else
				foreach ($value as $name => $type)
					$paramsName[$command] = $name;
		return $paramsName;			
	}
}