<?php

namespace Writer;

use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\GeneratorBundle\Generator\Generator;
use Writer\IWriter;

abstract class BaseWriter extends Response implements IWriter{

    protected $fileName;
    protected $data;
     
    public function __construct() {
        parent::__construct('', 200, array());
    }
    
    /** 
     * @param array $data
     * @param type $fileName
     * @return boolean
     */
    public function generate(array $data, $fileName) {
        try{
          $this->fileName = $fileName;
          foreach ($data as $customer){
            $dataArray[] = array('id'=>$customer->getId(),'name'=>$customer->getName(),'email'=>$customer->getEmail());
          }
          $this->data = $dataArray;
          $this->handleData();  
          Generator::dump($this->fileName, $this->getContent());
          return true;
        } catch (Exception $e){
          return false;  
        }
    }

    abstract public function handleData();
    
}