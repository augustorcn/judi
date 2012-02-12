<?php

namespace Judi;

class JudiTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @dataProvider providerSetProcedure
	 */
	public function testSetProcedure($config)
	{
		$Judi = new Judi($config);
	}

	public function providerSetProcedure()
	{
        return array(
            array("
Commands:
  criar:
    class: classCriar
    options:
      controllerCriar:
        params:
          paramCriar: string
  deletar:
    class: classDeletar
    options:
      controllerDeletar:
        params:
          ParamDeletar: string
          ParamDeletar2: string"
            )
		);
	}
}