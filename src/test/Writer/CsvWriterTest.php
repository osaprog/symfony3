<?php

namespace Writer;

class CsvWriterTest extends \PHPUnit_Framework_TestCase
{
    public function testCreateInstance()
    {
         $testObject = $this->getMock('Writer\CsvWriter');
         $this->assertInstanceOf('Writer\CsvWriter', $testObject);
    }

    public function testHandleData()
    {
        $testObject = $this->getMock('Writer\CsvWriter');
        $testObject->handleData(array('foo'=>'bar'),'test.csv');
    }
}