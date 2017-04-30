<?php

namespace Writer;

use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\GeneratorBundle\Generator\Generator;
use Writer\IWriter;
use \WriterBundle\Entity\Repository\CustomerRepository;

abstract class BaseWriter extends Response implements IWriter {

    protected $fileName;
    protected $data;

    public function __construct($fileExtension, CustomerRepository $customerRepository) {

        parent::__construct('', 200, array());
        $this->fileName = sprintf('test-%s.%s', date('Y-m-d'), $fileExtension);
        $data = $customerRepository->findAll();
        if (!empty($data)) {
            foreach ($data as $customer) {
                $dataArray[] = array('id' => $customer->getId(), 'name' => $customer->getName(), 'email' => $customer->getEmail());
            }
            $this->data = $dataArray;
        }
    }

    /**
     * @return boolean
     */
    public function generate() {
        try {
            $this->handleData();
            Generator::dump($this->fileName, $this->getContent());
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    abstract public function handleData();
}
