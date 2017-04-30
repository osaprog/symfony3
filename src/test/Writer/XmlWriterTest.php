<?php

namespace Writer;

class XmlWriterTest extends \PHPUnit_Framework_TestCase {

    public function testCreateInstance() {
        $this->assertInstanceOf('Writer\XmlWriter', $this->_getTestObject());
    }

    private function _getTestObject() {
        $repoStub = $this->getMockBuilder('WriterBundle\Entity\Repository\CustomerRepository')
                ->disableOriginalConstructor()
                ->disableOriginalClone()
                ->disableArgumentCloning()
                ->getMock();
        return $this->getMockBuilder('Writer\XmlWriter')
                        ->setConstructorArgs(array('xml', $repoStub))
                        ->getMock();
    }

}
