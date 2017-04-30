<?php

namespace Writer;

class BaseWriterTest extends \PHPUnit_Framework_TestCase
{
    public function testGenerate()
    {       
        $repoStub = $this->getMockBuilder('WriterBundle\Entity\Repository\CustomerRepository')
                ->disableOriginalConstructor()
                ->disableOriginalClone()
                ->disableArgumentCloning()
                ->getMock();
        
        $stub = $this->getMockForAbstractClass('Writer\BaseWriter', array('json', $repoStub));
        $stub->expects($this->once())
              ->method('handleData');

        $this->assertTrue($stub->generate());
    }
}