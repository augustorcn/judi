<?php

namespace Judi;

class Register extends Judi
{
	private $JudiInstance;
	
	public function __construct(Judi $judi)
	{
//		$this->JudiInstance = $judi;
	}
	
	public function setCommand($method, $name, $param)
	{
		$this->command[$name] = $method;
		return $this;
	}
}