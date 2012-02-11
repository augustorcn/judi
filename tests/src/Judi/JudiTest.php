<?php

namespace Judi;

class JudiTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @dataProvider providerSetProcedure
	 */
	public function testSetProcedure($method, Array $name, Array $params = null)
	{
		$Judi = new Judi(__DIR__ . '../../Sample/config.yml');
		$Judi->setProcedure($method, $name, $params);
		$command = $Judi->getCommand();
		$this->assertEquals($command[$name[0]][0], $method);
		$this->assertEquals($Judi->getOptions(), $name[1]);
		$this->assertEquals($Judi->getParams(), $params);
		$this->assertEquals('oi', $method);
	}

	public function providerSetProcedure()
	{
        return array(
            array(
                '\Sample\SampleClass',
                array(
                    'create' => array(
                        'controller' => array(
                            'name' => array(
                                'type'    => 'string',
                                'notnull' => true
                            )
                        )
                    )
                )
            )
		);
	}
}