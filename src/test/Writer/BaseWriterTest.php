<?php

namespace Writer;

class BaseWriterTest extends \PHPUnit_Framework_TestCase
{
    public function testGenerate()
    {
        $stub = $this->getMockForAbstractClass('Writer\BaseWriter');
        $stub->expects($this->once())
              ->method('handleData');
        $this->assertTrue($stub->generate(array('foo'=>'bar'),'test.xml'));
    }
}
