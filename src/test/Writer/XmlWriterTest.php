<?php

namespace Writer;

class XmlWriterTest extends \PHPUnit_Framework_TestCase
{
    public function testCreateInstance()
    {
         $testObject = $this->getMock('Writer\XmlWriter');
         $this->assertInstanceOf('Writer\XmlWriter', $testObject);
    }

    public function testHandleData()
    {
        $testObject = $this->getMock('Writer\XmlWriter');
        $testObject->handleData(array('foo'=>'bar'),'test.xml');
    }
}