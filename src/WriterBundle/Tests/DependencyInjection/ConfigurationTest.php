<?php

namespace Writer\WriterBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Processor;

class ConfigurationTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider dataForProcessedConfiguration
     */
    public function testProcessedConfiguration($configs, $expectedConfig)
    {
        $processor = new Processor();
        $configuration = new \WriterBundle\DependencyInjection\Configuration();
        $config = $processor->processConfiguration($configuration, $configs);

        $this->assertEquals($expectedConfig, $config);
    }

    public function dataForProcessedConfiguration()
    {
        return array(
            array(
                array(),
                array(
                    'csv'   => array(
                        'enabled'   => true,
                    ),
                    'xml' => array(
                        'enabled'   => true,
                    ),
                    'json' => array(
                        'enabled'   => true,
                    ) 
                    
                )
            ),
        );
    }
}
