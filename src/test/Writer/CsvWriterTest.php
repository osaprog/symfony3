<?php

namespace Writer;

class CsvWriterTest extends \PHPUnit_Framework_TestCase {

    public function testCreateInstance() {
        $this->assertInstanceOf('Writer\CsvWriter', $this->_getTestMockObject());
    }

    private function _getTestMockObject() {
        $repoStub = $this->getMockBuilder('WriterBundle\Entity\Repository\CustomerRepository')
                ->disableOriginalConstructor()
                ->disableOriginalClone()
                ->disableArgumentCloning()
                ->getMock();
        return $this->getMockBuilder('Writer\CsvWriter')
                        ->setConstructorArgs(array('csv', $repoStub))
                        ->getMock();
    }

}
